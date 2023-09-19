<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'abc',
             'password' => password_hash('123456',null),
         ]);

        $root = \App\Models\AdminUser::create([
            'username' => 'Administrator',
            'account' => 'root',
            'password' => password_hash('123456',PASSWORD_DEFAULT),
            'status' => '1',
        ]);
        $root->roles()->sync([1]);

        $this->call([
            AdminMenuSeeder::class,
            AdminRoleSeeder::class,
        ]);
    }
}
