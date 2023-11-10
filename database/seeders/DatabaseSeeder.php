<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\WalletStatus;
use App\Models\WalletType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $this->call([
            WalletTypeSeeder::class,
            WalletStatusSeeder::class,
            TransactionTypeSeeder::class,
            TransactionStatusSeeder::class,
        ]);
        if (\App\Models\User::count()==0){
            $user = User::create([
                'name' => 'Test',
                'email' => 'test@example.com',
                'password'=>bcrypt('A12345678#'),
                'email_verified_at'=>now()
            ]);
            $user->wallets()->create([
                'user_id'=>$user->id,
                'wallet_type_id'=>WalletType::SAVINGS,
                'wallet_status_id'=>WalletStatus::ACTIVE,
            ]);
        }
    }
}
