<?php

namespace Database\Seeders;

use App\Models\WalletType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        $updatedAt = now();
        if(WalletType::count()==0){
            WalletType::create([
                'id'=>WalletType::SAVINGS,
                'wallet_type'=>'savings',
                'wallet_type_name'=>'Savings',
                'is_active'=>true,
                'created_at'=>$createdAt,
                'updated_at'=>$updatedAt
            ]);
        }
    }
}
