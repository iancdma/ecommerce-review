<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_employee = new Role();
      $role_employee->name = 'admin';
      $role_employee->save();

      $role_manager = new Role();
      $role_manager->name = 'customer';
      $role_manager->save();
    }
}
