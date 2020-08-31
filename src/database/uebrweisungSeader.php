<?php

namespace App\database;


use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Console\Helper\Table;

class uebrweisungSeader
{

    public function __construct()
    {
        Capsule::schema()->create('ueberweisung', function ($table) {

            $table->increments('id');

            $table->integer('konto_id_source');

            $table->integer('konto_id_ziel');

            $table->double('beitrag')->unsigned();

            $table->timestamps();

        });

        //Capsule::schema()::dropIfExists('ueberweisung');
    }
}
