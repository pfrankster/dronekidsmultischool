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
        // DB::table('tmpPaymanType')->delete();
        DB::table('table_payman_types')->truncate();
        DB::table('table_payman_types')->insert([
            'name' => "Boleto"
        ]);
        DB::table('table_payman_types')->insert([
            'name' => "Cartão de Credito"
        ]);
    }
}
