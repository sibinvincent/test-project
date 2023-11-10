<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        $updatedAt = now();
        if (TransactionStatus::count()==0){
            TransactionStatus::insert([
                [
                    'id'=>TransactionStatus::INITIATED,
                    'status_name'=>'initiated',
                    'is_active'=>true,
                    'created_at'=>$createdAt,
                    'updated_at'=>$updatedAt
                ],
                [
                    'id'=>TransactionStatus::COMPLETED,
                    'status_name'=>'completed',
                    'is_active'=>true,
                    'created_at'=>$createdAt,
                    'updated_at'=>$updatedAt
                ],
                [
                    'id'=>TransactionStatus::FAILED,
                    'status_name'=>'failed',
                    'is_active'=>true,
                    'created_at'=>$createdAt,
                    'updated_at'=>$updatedAt
                ],
                [
                    'id'=>TransactionStatus::HOLD,
                    'status_name'=>'hold',
                    'is_active'=>true,
                    'created_at'=>$createdAt,
                    'updated_at'=>$updatedAt
                ],

            ]);
        }
    }
}
