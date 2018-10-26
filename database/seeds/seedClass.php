<?php

use Illuminate\Database\Seeder;

class seedClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'cursos';
        // DB::table($tableName)->delete();
        // DB::table($tableName)->truncate();

        DB::table($tableName)->insert([
            'nome' => 'PILOTO DE DRONE MIRIM (POSINT)',
            'escolaid' => 1
        ]);
        DB::table($tableName)->insert([
            'nome' => 'PILOTO DE DRONE #MIRIM (COLBM)',
            'escolaid' => 2
        ]);
        DB::table($tableName)->insert([
            'nome' => 'PILOTO DE DRONE #MIRIM (COLDEC)',
            'escolaid' => 3
        ]);
        DB::table($tableName)->insert([
            'nome' => 'FERIAS PILOTO DE DRONE #MIRIM (LARBT)',
            'escolaid' => 4
        ]);
        DB::table($tableName)->insert([
            'nome' => 'FERIAS PILOTO DE DRONE #MIRIM (LARSTM)',
            'escolaid' => 5
        ]);
        DB::table($tableName)->insert([
            'nome' => 'FERIAS PILOTO DE DRONE #MIRIM (HARMCG)',
            'escolaid' => 6
        ]);
        DB::table($tableName)->insert([
            'nome' => 'FERIAS PILOTO DE DRONE #MIRIM (FLYCCG)',
            'escolaid' => 7
        ]);
        DB::table($tableName)->insert([
            'nome' => 'PILOTO DE DRONE MIRIM (POSAMB)',
            'escolaid' => 8
        ]);
        DB::table($tableName)->insert([
            'nome' => 'PILOTO DE DRONE MIRIM (POSJUN)',
            'escolaid' => 9
        ]);
        DB::table($tableName)->insert([
            'nome' => 'PILOTO DE DRONE MIRIM (DKSCEN)',
            'escolaid' => 10
        ]);
    }
}
