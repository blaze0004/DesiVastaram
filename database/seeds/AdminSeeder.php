<?php

use App\Profile;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roleAdmin = Role::create([
        	'name' => 'Admin',
        	'description' => 'Admin Role'
        ]);

        $user = User::create([
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('password'),
        	'role_id' => $roleAdmin->id
        ]);
        
        Role::create([
            'name' => 'Seller',
            'description' => 'Seller Role'
        ]);

        Role::create([
            'name' => 'Buyer',
            'description' => 'Buyer Role'
        ]);

        Role::create([
            'name' => 'Trainer',
            'description' => 'Trainer Role'
        ]);

        Role::create([
            'name' => 'Quality Assurance',
            'description' => 'Quality Assurance Role'
        ]);

         Role::create([
            'name' => 'Designers',
            'description' => 'Designers Role'
        ]);

        Profile::create([
        	'user_id' => $user->id,
        ]);


    }
}
