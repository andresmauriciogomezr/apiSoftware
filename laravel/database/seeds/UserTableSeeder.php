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
       		'name' => 'Mauricio Gómez',
       		'email' => 'andresmauriciogomezr@gmail.com',
       		'password' => Hash::make('millonarios')

       	],

          [
          'name' => 'Mauricio Gómez',
          'email' => 'victor@gmail.com',
          'password' => Hash::make('victor')

        ]
       ];

       foreach ($users as $user) {
       		\App\User::create($user);
       }
    }
}
