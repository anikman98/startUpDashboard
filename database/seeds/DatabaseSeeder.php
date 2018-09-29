<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Super-Admin',
            'guard_name' => 'web',
        ]);

        $user = User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
            
        ]);

        $user->assignRole('Super-Admin');
        }
}
