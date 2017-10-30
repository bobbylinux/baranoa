<?php

use Faker\Generator as Faker;
use App\Models\Patient as Patient;
use App\Models\PatientDetail as PatientDetail;

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

$factory->define(Patient::class, function (Faker $faker) {

    return [
        'last_name' => $faker->lastName,
        'first_name' => $faker->firstName,
        'tax_code' => strtoupper(str_random(16)),
        'sex' => $faker->boolean ? "M" : "F",
        'date_of_birth' => $faker->date(),
        'city_id' => $faker->numberBetween(1,8432),
        'created_at' => now(),
    ];
});

$factory->define(PatientDetail::class, function (Faker $faker) {



    return [
        'patient_id' => $faker->numberBetween(1,30),
        'address' => $faker->address,
        'city_id' => $faker->numberBetween(1,8432),
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'created_at' => now(),
    ];
});