<?php

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\PatientDetail;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(Patient::class, 30)->create();
        factory(PatientDetail::class,50)->create();*/
        factory(User::class,10)->create();

    }
}
