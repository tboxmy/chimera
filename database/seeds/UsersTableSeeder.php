<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate(); 
           $users = [ 
            [ 
              'name' => 'Admin',
              'email' => 'admin@example.chimera',
              'password' => '123456',
              'is_admin' => '1',
            ],
            [
              'name' => 'User',
              'email' => 'user@example.chimera',
              'password' => '123456',
              'is_admin' => null,
            ]
          ];

          foreach($users as $user)
          {
              User::create([
               'name' => $user['name'],
               'email' => $user['email'],
               'is_admin' => $user['is_admin'],
               'password' => Hash::make($user['password'])
             ]);
           }

    }
}
