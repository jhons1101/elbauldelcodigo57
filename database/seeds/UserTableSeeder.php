<?php

use Illuminate\Database\Seeder;
use elbauldelcodigo\RolUser;
use elbauldelcodigo\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Se traen los modelos con los roles en sistema
         */
        $roleUser  = RolUser::where('rol_nombre', 'User')->first();
        $roleAdmin = RolUser::where('rol_nombre', 'AdminPost')->first();

        /**
         * Usuario AdminiPost
         */
        $user = new User();
        $user->name     =  "jhons1101";
        $user->email    = "jhons_1101@hotmail.com";
        $user->password = bcrypt('tw1Ueawb');
        $user->save();
        $user->roles()->attach($roleAdmin);


        /**
         * Usuario User
         */
        $user = new User();
        $user->name     =  "st3v3n1101";
        $user->email    = "st3v3n1101@gmail.com";
        $user->password = bcrypt('steven1101');
        $user->save();
        $user->roles()->attach($roleUser);
    }
}
