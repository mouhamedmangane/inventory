<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BoutiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boutiques')->insert([
            'nom' => 'Noppal Shop',
            'compte' => 20000,
        ]);
        DB::table('boutiques')->insert([
            'nom' => 'Téranga Boutique',
            'compte' => 10000,
        ]);
    }
}
