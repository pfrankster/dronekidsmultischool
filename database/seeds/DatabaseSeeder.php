<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        // $this->call(UsersTableSeeder::class);
        // $this->call('UserTableSeeder');
        // $this->call('seedClass');
        $this->call('seedPaymantType');
        $this->call('seedPEStatus');
        // $this->call('seedSchool');
        // $this->call('seedSection');
        $this->command->info('User table seeded!');
    }

    
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        // User::create(array('name'=>'Jonas','email' => 'foo@bar.com','password'=>'666.'));
        // User::create(array('email' => 'foo@bar.com'));

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }

}
