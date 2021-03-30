<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // Models\Entreprise::factory(1)->create();
      //  Models\Boutique::factory(5)->create();
         //Models\User::factory()->count(10)->create();
        // App\Models\Role::factory(10)->create();
        // App\Models\DroitSpecifique::factory(5)->create();
        // App\Models\DroitDefault::factory(6)->create();
        App\Models\Client::factory(10)->create();
        App\Models\Fournisseur::factory(10)->create();
        // App\Models\Depense::factory(10)->create();
        // App\Models\Evenement::factory(10)->create();

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }

}
//
