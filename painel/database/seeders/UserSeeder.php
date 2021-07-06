<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::firstWhere('email', 'admin@diaristafacil.com.br')) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@diaristafacil.com.br',
                'email_verified_at' => now(),
                'phone' => '490923092039',
                'phone_verified_at' => now(),
                'password' => '$2y$10$xC/ywLl7jqJq/en3AxQVbuy/F0DiquzFaOh.TmTY75AfEA9P2WMGW', // kodejifr
                'asaas_customer_id' => 'cus_000004683441',
                'remember_token' => Str::random(10),
                'admin' => true,
                'cpf' => Str::random(10),
                'rg' => Str::random(10)
            ]);
        }

        User::factory()->count(100)->create();
    }
}
