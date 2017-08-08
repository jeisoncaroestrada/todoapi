<?php

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
        $users = [
	        [
	        	'email' => 'jeisoncaroestrada@hotmail.com',
	        	'password' => Hash::make('12345678')
	        ]
        ];

        foreach ($users as $user) {
        	App\User::create($user);
        }
    }
}
