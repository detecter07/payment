<?php

declare(strict_types=1);


namespace App\validation;


class validation
{



    public static  function validateBeitrag(double $beitrag): bool
    {
        if ($beitrag < 5000) {
            return True;
        } else {
            return false;
        }
    }

    public static function validatekonto(string $IBAN): bool
    {
        if (preg_match("/[A-Z]{2}[1-9]{2}[1-9]{8}[0-9]{10}$/", $IBAN)) {
            return True;
        } else {
            return false;
        }
    }
}
