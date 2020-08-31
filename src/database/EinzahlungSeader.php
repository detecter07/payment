<?php

namespace App\database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Console\Helper\Table;

class EinzahlungSeader
{

    public function __construct()
    {
        Capsule::schema()->create('Einzahlung', function ($table) {

            $table->increments('id');

            $table->double('beitrag');

            $table->integer('konto_id')->unsigned();


            $table->foreign('konto_id ')->references('id')->on('kontos');


            $table->timestamps();
        });

        echo "table created";

    }
}
