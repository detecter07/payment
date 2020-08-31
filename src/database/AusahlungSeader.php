<?php

namespace App\database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Console\Helper\Table;

class AusahlungSeader
{

    public function __construct()
    {
        Capsule::schema()->create('Auszahlung', function ($table) {

            $table->increments('id');

            $table->double('beitrag');

            $table->integer('konto_id')->unsigned();


            $table->timestamps();
        });

        echo "table created";

    }
}
