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
        // DB::table('tmp_sections')->delete();
        // DB::table('tmp_sections')->truncate();
        DB::table('tmp_sections')->insert([
            'name' => "A",
            'schoolId' => 1,
            'classId' => 1,
        ]);
        DB::table('tmp_sections')->insert([
            'name' => "B",
            'schoolId' => 1,
            'classId' => 2,
        ]);
        DB::table('tmp_sections')->insert([
            'name' => "A",
            'schoolid' => 2,
            'classid' => 2,
        ]);
        DB::table('tmp_sections')->insert([
            'name' => "B",
            'schoolId' => 2,
            'classId' => 3,
        ]);
        DB::table('tmp_sections')->insert([
            'name' => "A",
            'schoolId' => 3,
            'classId' => 3,
        ]);
        DB::table('tmp_sections')->insert([
            'name' => "B",
            'schoolId' => 3,
            'classId' => 4,
        ]);
    }
}
