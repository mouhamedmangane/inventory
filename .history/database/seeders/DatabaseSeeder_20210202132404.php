<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models;

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
         Models\User::factory()->count(1)->create();
        // App\Models\Role::factory(10)->create();
        // App\Models\DroitSpecifique::factory(5)->create();
        // App\Models\DroitDefault::factory(6)->create();
        // App\Models\Client::factory(10)->create();
        // App\Models\Fournisseur::factory(10)->create();
        // App\Models\Depense::factory(10)->create();
        // App\Models\Evenement::factory(10)->create();
         Models\GroupeProduit::factory(10)->create();
        // App\Models\Achat::factory(10)->create();
        // App\Models\Vente::factory(10)->create();
      //  Models\Produit::factory(50)->create();
        // App\Models\LigneAchatRecu::factory(7)->create();
        // App\Models\LigneAchatDemande::factory(5)->create();
        // App\Models\LignePayementAchats::factory(10)->create();
        // App\Models\LignePayementVentes::factory(10)->create();
       
       
    }
}
// 