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
        // DB::table('tmpSchool')->delete();
        // DB::table('tmpSchool')->truncate();
        DB::table('tmp_schools')->insert([
            'name' => "Bom Jesus"
        ]);
        DB::table('tmp_schools')->insert([
            'name' => "Dom Bosco"
        ]);
        DB::table('tmp_schools')->insert([
            'name' => "Positivo"
        ]);
    }
}
