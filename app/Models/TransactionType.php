<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    const DEPOSIT = 1;
    const TRANSFER = 2;
    const WITHDRAW = 3;
    use HasFactory;
}
