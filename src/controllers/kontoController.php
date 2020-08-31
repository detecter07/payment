<?php

declare(strict_types=1);

namespace App\controllers;

use App\Entity\Einzahlung;
use App\Entity\User;
use App\Entity\konto;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use PDOException;
use PHPUnit\Framework\Constraint\Exception as ConstraintException;
use App\validation\validation;
use App\Entity\ueberweisung;
use App\Entity\Auszahlung;

class KontoController
{


    private $konto_list = [];

    public function __construct()
    {

        $this->konto_list = Konto::all();
    }
    public function addkonto($konto_inhaber, $konto_nummer)
    {

        try {
            $konto = new Konto;

            $konto->konto_inhaber = $konto_inhaber;

            $konto->konto_nummer = $konto_nummer;

            $konto = Konto::create([
                'konto_inhaber' => $konto_inhaber,
                'konto_nummer' => $konto_nummer
            ]);

            if ($konto) {
                $konto->save();
                $_REQUEST['SESSION'] = $konto['konto_inhaber'];

                echo $_REQUEST['SESSION'];
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public static function konto_exists(string $konto_nummer): bool
    {
        $konto_num = Konto::select('konto_nummer')->get()->toArray();

        //var_dump($konto_num);

        if (in_array($konto_nummer, $konto_num)) {
            return true;
            //echo "ok";
        } else {
            //echo "no ok ";
            return false;
        }
    }

    public static function Einzahlen($beitrag, $konto_nummer): void
    {
        try {

            $konto = Konto::Where('konto_nummer', $konto_nummer)->first();


            if ($beitrag < 5000) {

                $einzahlung = new Einzahlung();

                $konto->konto_stand += $beitrag;

                $einzahlung->konto_id = $konto->id;

                $einzahlung->beitrag = $beitrag;

                if ($einzahlung) {
                    $einzahlung->save();
                    $konto->save();
                    echo "Einzahlung erfolgreich";
                } else {

                    echo "ein Fehler ist geschehen ";
                }
            } else {
                echo "der Beitrag muss nicht 5000 überschreiten";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function Auszahlen($beitrag, $konto_nummer): void
    {
        try {

            $konto = Konto::Where('konto_nummer', $konto_nummer)->first();


            if ($beitrag <= $konto->konto_stand ) {

                $Auszahlung = new Auszahlung();

                $konto->konto_stand -= $beitrag;

                $Auszahlung->konto_id = $konto->id;

                $Auszahlung->beitrag = $beitrag;

                if ($Auszahlung) {
                    $Auszahlung->save();
                    $konto->save();
                    echo "Geld ausgehoben ";
                } else {

                    echo "das geld kann nicht abgehoben werden ";
                }
            } else {
                echo "das konto reicht nicht aus";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function ueberweisung($beitrag, string $konto_source, string $konto_ziel): void
   {
       try {

           $konto_src = Konto::Where('konto_nummer', $konto_source)->first();

           $konto_zl = Konto::Where('konto_nummer', $konto_ziel)->first();

           if ($beitrag <= 200 && $konto_zl && $konto_src->konto_stand > $beitrag ) {

               $ueberweisung = new ueberweisung();

               $ueberweisung->konto_id_source  = $konto_src->id;

               $ueberweisung->konto_id_ziel  = $konto_zl->id;

              $konto_zl->konto_stand  += $beitrag;

              $konto_src->konto_stand  -= $beitrag;

               $ueberweisung->beitrag = $beitrag;

               if ($ueberweisung) {
                   $ueberweisung->save();
                   $konto_zl->save();
                   $konto_src->save();


                   echo "created";
               } else {

                   echo "error";
               }
           } else {
               echo "die Beitrag muss nicht 5000 überschreiten";
           }
       } catch (Exception $ex) {
           echo $ex->getMessage();
       }
   }


   public function konto_uebersicht(string $konto_nummer):void
   {
    $konto = Konto::Where('konto_nummer', $konto_nummer)->first();

    $einzahlung = Einzahlung::where('konto_id',$konto->id)->get()->toArray();


    $auszahlung = Auszahlung::where('konto_id',$konto->id)->get()->toArray();


    echo 'IBAN => '.$konto['konto_nummer'];
    echo"\n";
    echo"\n";


    echo 'Einzahlungen'."\t \t";
    echo"\n";
    foreach ($einzahlung as $value) {

      echo 'beitrag'.' => ';
      echo "+".$value['beitrag'];
      echo"\n";

      echo date('l', strtotime($value['created_at'])).' '.date('d-m-Y H:i:s', strtotime($value['created_at']));
      echo"\n";

    }
    echo"\n";
    echo"\n";

    echo 'Auszahlungen';

    echo "\n";

    foreach ($auszahlung as $value) {

      echo 'beitrag'.' => ';

      echo "-".$value['beitrag'];

      echo "\n";

      echo date('l', strtotime($value['created_at'])).'  '.date('d.m.Y H:i:s', strtotime($value['created_at']));

      echo "\n";

    }

    echo "Ihre Aktuel konto stand  => ". $konto['konto_stand'];

   }
    private function format_date($datetime)
    {
        return date_format($datetime, 'd.m.Y H:i:s');
    }

    public function konto_status(): array
    {
        $konto_list = konto::all();
        $konto = [];

        foreach ($konto_list as $list) {
            $konto[] = $list;
        }

        return $konto;
    }






    public function getKontStand(int $konto_id): float
    {
        $sum = [];

        $einzahlung = Einzahlung::where('konto_id', $konto_id)->get();

        foreach ($einzahlung as $s) {
            $sum[] = $s->beitrag;
        }

        $total = array_sum($sum);


        return $total;
    }

    public function IBANadd(string $iban)
    {

        if (validation::validatekonto($iban)) {

            return True;
        } else {

            return FALSE;
        }
    }
    public function Einzahlungen(int $konto_id): array
    {

        $list = Einzahlung::geteinzahlung_byID($konto_id);
        return $list;
    }

    public function __toString()
    {
        return $this->konto_list;
    }

    public function ueberzeisung($konto_source, $konto_ziel, $beitrag)
    {
    }
}
