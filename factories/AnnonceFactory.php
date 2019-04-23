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

$factory->define(App\Annonce::class, function (Faker $faker) {
    return [
        'typeannonce'=>'Offre',
        'natureannonce'=>'Changement',
        'designation'=>'annonce1',
        'refproduit'=>1,
        'qte'=>200.0,
        'refproduitEchange'=>2,
        'qteEchange'=>200.0,
        //'file'=>'file'
        

      
            

            

    ];
});
