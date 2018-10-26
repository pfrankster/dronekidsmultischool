<?php

use Illuminate\Database\Seeder;

class seedPaymantType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'paymant_types';
        // DB::table('tmpPaymanType')->delete();
        // DB::table($tableName)->truncate();
        DB::table($tableName)->insert([
            'name' => "Boleto"
        ]);
        DB::table($tableName)->insert([
            'name' => "Cartão de Credito"
        ]);
    }
}
