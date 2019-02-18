<?php

use App\Role;
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
      $role_admin  = Role::where('name', 'admin')->first();

      factory(User::class, 10)->create();

      $admin = new User();
      $admin->name = 'Ian';
      $admin->email = 'admin@admin.com';
      $admin->password = bcrypt('secret');
      $admin->role_id = $role_admin->id;
      $admin->save();
    }
}
