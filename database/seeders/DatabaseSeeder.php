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
        try {


         \App\Models\User::factory()->create([
             'username' => 'Test User',
             'email' => 'test',
             'password' => password_hash('123456',null),
         ]);

        $root = \App\Models\AdminUser::create([
            'username' => 'Administrator',
            'account' => 'admin',
            'password' => password_hash('123456',PASSWORD_DEFAULT),
            'status' => '1',
        ]);
        $root->roles()->sync([1]);

        $this->call([
            AdminMenuSeeder::class,
            AdminRoleSeeder::class,
        ]);
        }catch (\Throwable $th){
            $this->command->error($th->getMessage());
        }
    }
}
