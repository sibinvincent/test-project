<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletType extends Model
{
    use HasFactory;

    const SAVINGS  = 1;

    protected $fillable = [
      'wallet_type','wallet_type_name'
    ];
}
