<?php

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
        /*   $this->call(FuncaoCargoTableSeeder::class);
        $this->call(CargoProcessoTableSeeder::class);
        */


       // $this->call(UsersTableSeeder::class);
      
        $this->call(EscolaridadeTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(SexoTableSeeder::class);
        
        $this->call(UnidadeTableSeeder::class);
        $this->call(CargoTableSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(FuncoesSeeder::class);
        $this->call(FuncoesCargoSeeder::class);
    }
}
