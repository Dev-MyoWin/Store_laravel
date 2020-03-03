<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Editor',
          'email' => 'editor@gmail.com',
          'password' => Hash::make('secret'),
          'role_id' => 1,
          'created_at' => now(),
          'updated_at' => now()
      ]);

      DB::table('users')->insert([
          'name' => 'Admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('secret'),
          'role_id' => 2,
          'created_at' => now(),
          'updated_at' => now()
      ]);
    }
}
