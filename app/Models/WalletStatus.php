<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletStatus extends Model
{
    use HasFactory;

    const ACTIVE = 1;

    protected $fillable = [
        'status_name'
    ];
}
