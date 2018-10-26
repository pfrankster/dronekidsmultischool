<?php

use Illuminate\Database\Seeder;

class seedSchool extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'escolas';
        // DB::table('$tableName')->delete();
        // DB::table('$tableName')->truncate();

        DB::table($tableName)->insert([
            'nome' => 'POSITIVO INTERNACIONAL'
        ]);
        DB::table($tableName)->insert([
            'nome' => 'COLÉGIO DO BOSQUE MANANCIAIS'
        ]);
        DB::table($tableName)->insert([
            'nome' => 'COLÉGIO DECISIVO'
        ]);
        DB::table($tableName)->insert([
            'nome' => 'LA ROBÓTICA - BATEL - CURITIBA/PR'
        ]);
        DB::table($tableName)->insert([
            'nome' => 'LA ROBÓTICA - SANTA MARIA - CURITIBA/PR'
        ]);
        DB::table($tableName)->insert([
            'nome' => 'COLÉGIO HARMONIA - CAMPO GRANDE/MS'
        ]);
        DB::table($tableName)->insert([
            'nome' => 'FLY COMPANY - CAMPO GRANDE/MS'
        ]);
        DB::table($tableName)->insert([
            'nome' => 'POSITIVO AMBIENTAL'
        ]);
        DB::table($tableName)->insert([
            'nome' => 'POSITIVO JUNIOR'
        ]);
        DB::table($tableName)->insert([
            'nome' => 'DRONE KIDS CENTRO - Barão do Rio Branco, 564 - Curitiba/Pr'
        ]);
        
    }
}
