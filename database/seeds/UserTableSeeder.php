<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'first_name' => 'Admin first name',
            'last_name' => 'Admin last name',
            'alias' => 'Admin alias',
            'username' => 'admin',
            'extension' => 'Admin extension',
            'password' => '12341234',
            'status' => '1',
            'attempts' => '0',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        User::create([
            'first_name' => 'Bruce',
            'last_name' => 'Wayne',
            'alias' => 'Dark Knight',
            'username' => 'batman',
            'extension' => 'batman extension',
            'password' => '12341234',
            'status' => '1',
            'attempts' => '0',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        User::create([
            'first_name' => 'Clark',
            'last_name' => 'Kent',
            'alias' => 'Man of steel',
            'username' => 'superman',
            'extension' => 'Superman extension',
            'password' => '12341234',
            'status' => '1',
            'attempts' => '0',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        User::create([
            'first_name' => 'Walter',
            'last_name' => 'White',
            'alias' => 'Mr. White',
            'username' => 'heisenberg',
            'extension' => 'Heisenberg extension',
            'password' => '12341234',
            'status' => '1',
            'attempts' => '0',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        User::create([
            'first_name' => 'Jesse',
            'last_name' => 'Pinkman',
            'alias' => 'The Guy',
            'username' => 'pinkman',
            'extension' => 'Pinkman extension',
            'password' => '12341234',
            'status' => '1',
            'attempts' => '0',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        User::create([
            'first_name' => 'Jon',
            'last_name' => 'Snow',
            'alias' => 'Lord Commander',
            'username' => 'snow',
            'extension' => 'Snow extension',
            'password' => '12341234',
            'status' => '1',
            'attempts' => '0',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        User::create([
            'first_name' => 'Obi-Wan',
            'last_name' => 'Kenobi',
            'alias' => 'Jedi',
            'username' => 'kenobi',
            'extension' => 'kenobi extension',
            'password' => '12341234',
            'status' => '1',
            'attempts' => '0',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        User::create([
            'first_name' => 'Anakin',
            'last_name' => 'Skywalker',
            'alias' => 'Darth Vader',
            'username' => 'skywalker',
            'extension' => 'skywalker extension',
            'password' => '12341234',
            'status' => '1',
            'attempts' => '0',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        User::create([
            'first_name' => 'Lara',
            'last_name' => 'Croft',
            'alias' => 'Tomb Raider',
            'username' => 'croft',
            'extension' => 'croft extension',
            'password' => '12341234',
            'status' => '1',
            'attempts' => '0',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}
