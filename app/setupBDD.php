<?php

use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$capsule = new Capsule;

if (is_array($bddConfig = parse_ini_file('./config/bdd.ini')))
    $capsule->addConnection($bddConfig);
else {
    echo "ERREUR : Fichier de configuration de la base de donnée introuvable";
    exit();
}

// Make this Capsule instance available globally
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();

Capsule::dropIfExists('users');
Capsule::schema()->create('users', function ($table) {
    $table->increments('id')->primary();
    $table->boolean('teacher')->default(false);
    $table->string('identifiant')->unique();
    $table->string('email')->unique();
    $table->string('password');
    $table->timestamps();
});

Capsule::dropIfExists('exercises');
Capsule::schema()->create('exercises', function ($table) {
    $table->increments('id')->primary();
    $table->string('title');
    $table->string('description');
    $table->string('enonce');
    $table->integer('owner_id');
    $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
});

Capsule::dropIfExists('groups');
Capsule::schema()->create('groups', function ($table) {
    $table->increments('id')->primary();
    $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
});