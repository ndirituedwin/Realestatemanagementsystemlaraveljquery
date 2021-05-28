<?php

namespace Database\Seeders;

use CreateTenantbalancesTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
     $this->call(UserTableSeeder::class);
     /*$this->call(Propertytableseeder::class);
     $this->call(TenantbalancesTableSeeder::class);
     $this->call(VacantUnittableseeder::class);*/
     //$this->call(categorytableseeder::class);
  //   $this->call(Testtablesseeder::class);
    } 
   
}
