 <?php

    require "vendor/autoload.php";

    require_once './src/config/database.php';

    use App\controllers\KontoController;


    $konto = new KontoController();


    //$konto->Einzahlen(120, "DE2231247896522257123");


    $konto->konto_uebersicht("DE2231247896522257123");
