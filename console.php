<?php

/** console.php **/
#!/usr/bin/env php

require "vendor/autoload.php";

use Symfony\Component\Console\Application;
use Console\EinzahlungCommand;
use Console\EntityCommand;
use Console\uebeiweisungCommand;
use Console\entityuberweisungCommand;
use Console\entityAuszahlungCommand;
use Console\AuszahlungCommand;
use Console\uebersichtCommand;
use Console\addkontoCommand;

$app = new Application('Console App', 'v1.0.0');
$app->add(new EinzahlungCommand());
$app->add(new EntityCommand());
$app->add(new uebeiweisungCommand());
$app->add(new entityuberweisungCommand());
$app->add(new entityAuszahlungCommand());
$app->add(new AuszahlungCommand());
$app->add(new uebersichtCommand());
$app->add(new addkontoCommand());
$app->run();
