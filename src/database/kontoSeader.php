<?php

namespace App\database;


use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Console\Helper\Table;

class kontoSeader
{

    public function __construct()
    {
        Capsule::schema()->create('kontos', function ($table) {

            $table->increments('id');

            $table->string('konto_inhaber');

            $table->string('konto_nummer')->unique();

            $table->boolean('status');

            $table->double('konto_stand');

            $table->timestamps();
        });
    }
}
