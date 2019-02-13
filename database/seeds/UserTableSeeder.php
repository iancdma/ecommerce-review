<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_customer = Role::where('name', 'customer')->first();
      $role_admin  = Role::where('name', 'admin')->first();
      $faker = Faker\Factory::create();
      
      for($i = 0; $i < 10; $i++) {
        App\User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
            'role_id' => $role_customer->id,
        ]);
    }

      $admin = new User();
      $admin->name = 'Ian';
      $admin->email = 'admin@admin.com';
      $admin->password = bcrypt('secret');
      $admin->role_id = $role_admin->id;
      $admin->save();
    }
}
