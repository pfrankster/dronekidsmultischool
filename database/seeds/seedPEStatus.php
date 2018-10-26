<?php

use Illuminate\Database\Seeder;

class seedPEStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pe_status')->insert([
            'name' => "Waiting Payment"
        ]);
        DB::table('pe_status')->insert([
            'name' => "Payed"
        ]);
    }
}
