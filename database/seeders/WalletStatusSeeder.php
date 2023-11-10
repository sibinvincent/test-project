<?php

namespace Database\Seeders;

use App\Models\WalletStatus;
use App\Models\WalletType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        $updatedAt = now();
        if (WalletStatus::count()==0){
            WalletStatus::insert([
               [
                   'id'=>1,
                   'status_name'=>'Active',
                   'created_at'=>$createdAt,
                   'updated_at'=>$updatedAt
               ],
                [
                   'id'=>2,
                   'status_name'=>'Blocked',
                    'created_at'=>$createdAt,
                    'updated_at'=>$updatedAt
               ],
                [
                   'id'=>3,
                   'status_name'=>'In active',
                    'created_at'=>$createdAt,
                    'updated_at'=>$updatedAt
                ],
            ]);
        }
    }
}
