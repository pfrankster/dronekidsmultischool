<?php

use Illuminate\Database\Seeder;

class seedSection extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'turmas';
        // DB::table($tableName)->delete();
        // DB::table($tableName)->truncate();

        
        // 8, 10, 2018, 1, 'MANHÃ', 24, 1),
        // 8, 10, 2018, 1, 'TARDE', 24, 1),
        // 9, 11, 2018, 1, 'MANHÃ', 24, 1),
        //  9, 11, 2018, 1, 'TARDE', 24, 1),
        // 10, 12, 2018, 1, 'MANHÃ', 24, 1),
        // 10, 12, 2018, 1, 'TARDE', 24, 1),
        // 11, 13, 2018, 2, ' 4º e 5º anos manhã regular - SEGUNDAS - 12:20h\r\n\r\n', 24, 1),
        // 11, 13, 2018, 2, ' 6º e 7º ano manhã regular - SEXTAS - 12:20h\r\n\r\n', 24, 1),
        // 11, 13, 2018, 2, ' 4º e 5º ano tarde regular - TERÇAS - 18:25h\r\n', 24, 1),
        // 11, 13, 2018, 2, ' 6º e 7º ano tarde regular - QUINTAS - 18:25h', 24, 1),
        // 11, 13, 2018, 2, ' 4º a 7º integral - SEXTAS - 16:50h', 24, 1),
        // 12, 14, 2018, 2, ' 4º a 7º anos - TERÇAS - 13:30h\r\n', 24, 1),
        // 12, 14, 2018, 2, ' 4º e 5º anos - TERÇAS- 16:50h', 24, 1),
        // 12, 14, 2018, 2, ' 6º e 7º anos - TERÇAS- 18:15h\r\n', 24, 1),
        // 12, 14, 2018, 2, ' 4º e 5º anos - TERÇAS- 18:25h', 24, 1),
        // 12, 14, 2018, 2, ' 4º a 7º anos - SEXTAS- 13:30h', 24, 1),
        // 12, 14, 2018, 2, ' 6º e 7º anos - SEXTAS- 18:15h', 24, 1),
        // 12, 14, 2018, 2, ' 4º e 5º anos - SEXTAS- 18:25h', 24, 1),
        // 13, 15, 2018, 2, 'Seg a Sex - Manhã', 15, 1),
        // 13, 15, 2018, 2, 'Seg a Sex - Tarde', 15, 1);

        DB::table($tableName)->insert([
            'idescola' => 1,
            'idcurso' => 1,
            'deschorario' => 'FUNDAMENTAL I - TERÇAS - 16:50'
        ]);
        DB::table($tableName)->insert([
            'idescola' => 1,
            'idcurso' => 1,
            'deschorario' => 'FUNDAMENTAL I - TERÇAS - 16:50'
        ]);
        DB::table($tableName)->insert([
            'idescola' => 1,
            'idcurso' => 1,
            'deschorario' => 'FUNDAMENTAL II - SEXTAS - 16:50'
        ]);
        DB::table($tableName)->insert([
            'idescola' => 1,
            'idcurso' => 1,
            'deschorario' => 'FUNDAMENTAL II - SEXTAS - 16:50'
        ]);
        DB::table($tableName)->insert([
            'idescola' => 2,
            'idcurso' => 6,
            'deschorario' => 'FUNDAMENTAL I - TERÇAS - 17:00'
        ]);
        DB::table($tableName)->insert([
            'idescola' => 2,
            'idcurso' => 6,
            'deschorario' => 'FUNDAMENTAL II - QUINTAS - 17:00' 
        ]);
        DB::table($tableName)->insert([
            'idescola' => 3,
            'idcurso' => 8,
            'deschorario' => 'FUNDAMENTAL I - TERÇAS - 18 ÀS 19H'
        ]);
        DB::table($tableName)->insert([
            'idescola' => 3,
            'idcurso' => 8,
            'deschorario' => 'FUNDAMENTAL II - QUINTAS - 18 ÀS 19H'
        ]);
        DB::table($tableName)->insert([
            'idescola' => 4,
            'idcurso' => 9,
            'deschorario' => 'MANHÃ'
        ]);
        DB::table($tableName)->insert([
            'idescola' => 4,
            'idcurso' => 9,
            'deschorario' => 'TARDE'
        ]);
        
    }
}
