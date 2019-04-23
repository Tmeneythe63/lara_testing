<?php

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

$factory->define(App\Produit::class, function (Faker $faker) {
    return [
        'reference'=>'ref1',
        'designation'=>'prod1',
        'formule'=>'prod1',
        'qte'=>'100',
        'categorie'=>'gaz',
        'unite'=>'H2O'

    ];
});
