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
        // DB::table('tmp_classes')->delete();
        // DB::table('tmp_classes')->truncate();

        DB::table('tmp_classes')->insert([
            'name' => "Mathematica"
        ]);
        DB::table('tmp_classes')->insert([
            'name' => "Portugues"
        ]);
        DB::table('tmp_classes')->insert([
            'name' => "Fisica"
        ]);
        DB::table('tmp_classes')->insert([
            'name' => "Quimica"
        ]);
    }
}
