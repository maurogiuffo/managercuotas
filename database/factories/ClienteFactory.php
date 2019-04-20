<?php

use App\Cliente;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Cliente::class, function (Faker $faker) {

   // 'nombre','apellido','dni','direccion','telefono'
    return [
        'nombre' => $faker->firstNameMale,
        'apellido' => $faker->lastName,
        'dni' => $faker->numberBetween(10000000, 40000000) ,
        'direccion' => $faker->streetAddress ,
        'telefono' => $faker->e164PhoneNumber,
    ];
});
