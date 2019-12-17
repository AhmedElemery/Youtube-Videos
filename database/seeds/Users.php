<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super_admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'group' => 'admin'
        ]);
    }
}
