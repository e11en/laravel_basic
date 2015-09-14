<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);

        Model::reguard();
    }
}

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(array(
            'name' => 'Ellen Langelaar',
            'email' => 'ellenlangelaar@gmail.com',
            'password' => bcrypt('password')
        ));

    }
}

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Role();
        $admin->name = 'admin';
        $admin->display_name = 'Administrator';
        $admin->save();

        \App\User::all()->first()->attachRole($admin);

        $super = new \App\Role();
        $super->name = 'supervisor';
        $super->display_name = 'Supervisor';
        $super->save();

        $super = new \App\Role();
        $super->name = 'member';
        $super->display_name = 'Member';
        $super->save();
    }
}
