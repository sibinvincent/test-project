<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model
{
    const INITIATED = 1;
    const COMPLETED = 2;
    const FAILED = 3;
    const HOLD = 4;

    use HasFactory;
}
