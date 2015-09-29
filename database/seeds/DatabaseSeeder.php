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

        App\User::create(array(
            'name' => 'Test Admin',
            'email' => 'a.test@test.nl',
            'password' => bcrypt('test')
        ));

        App\User::create(array(
            'name' => 'Test Super',
            'email' => 's.test@test.nl',
            'password' => bcrypt('test')
        ));

        App\User::create(array(
            'name' => 'Test Member',
            'email' => 'm.test@test.nl',
            'password' => bcrypt('test')
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

        $super = new \App\Role();
        $super->name = 'supervisor';
        $super->display_name = 'Supervisor';
        $super->save();

        $member = new \App\Role();
        $member->name = 'member';
        $member->display_name = 'Member';
        $member->save();

        \App\User::find(1)->attachRole($admin);
        \App\User::find(2)->attachRole($admin);
        \App\User::find(3)->attachRole($super);
        \App\User::find(4)->attachRole($member);
    }
}