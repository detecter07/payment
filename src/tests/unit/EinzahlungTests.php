<?php

declare(strict_types=1);

namespace App\tests;

use PHPUnit\Framework\TestCase;

use App\controllers\KontoController;

use App\Entity\konto;

use App\Entity\Einzahlung;

final class EinzahlungTest extends TestCase
{


    public function testkontoexists(): void
    {

        $konto_nummer = KontoController::konto_exists("58745963244");


        //$this->assertContains();
    }
}
