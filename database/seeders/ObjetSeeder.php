<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB,Str;
use App\Models\Objet;

class ObjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Objet::factory()
        ->count(5)
        ->create();
    }
}
