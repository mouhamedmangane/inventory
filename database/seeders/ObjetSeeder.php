<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ObjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objets')->insert([
            'objet_name' => 'Vente',
            'done_by_user' => 1,
        ]);
        DB::table('objets')->insert([
            'objet_name' => 'Achat',
            'done_by_user' => 1,
        ]);
        DB::table('objets')->insert([
            'objet_name' => 'Contact',
            'done_by_user' => 1,
        ]);
        DB::table('objets')->insert([
            'objet_name' => 'Produit',
            'done_by_user' => 1,
        ]);

    }
}
