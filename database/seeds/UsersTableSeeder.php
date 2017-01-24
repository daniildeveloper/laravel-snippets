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
        //create admin user
        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@admin.loc';
        $admin->password = bcrypt('admin');
        $admin->money = 1000;
        $admin->role = 3;
        $admin->save();

        //create me
        $owner = new User();
        $owner->name = 'Daniil';
        $owner->email = 'daniilborowkow@yandex.ru';
        $owner->password = bcrypt('12345678');
        $owner->money = '100000';
        $owner->role = 777;
        $owner->save();
    }
}
