<?php

namespace Database\Seeders;

use App\Models\TransactionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdAt = now();
        $updatedAt = now();
        if(TransactionType::count()==0){
            TransactionType::insert([
                [
                    'id'=>TransactionType::DEPOSIT,
                    'type_name'=> 'deposit',
                    'created_at'=>$createdAt,
                    'updated_at'=>$updatedAt
                ],
                [
                    'id'=>TransactionType::TRANSFER,
                    'type_name'=> 'transfer',
                    'created_at'=>$createdAt,
                    'updated_at'=>$updatedAt
                ],
                [
                    'id'=>TransactionType::WITHDRAW,
                    'type_name'=> 'withdrawal',
                    'created_at'=>$createdAt,
                    'updated_at'=>$updatedAt
                ],
            ]);
        }
    }
}
