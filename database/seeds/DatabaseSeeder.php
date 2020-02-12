<?php

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
        App\User::create(
            [
                'name' => 'Jayanti Rai',
        'email' => 'jayanti@jayanti.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' =>'dfdsfjkdshfj skdhfdskj hfhjkdf dshfjdhsfjksdh fjkhdsjkf',
            ]
            );
        factory(App\User::class, 10)->create();
        factory(App\Art::class, 50)->create();

    }
}
