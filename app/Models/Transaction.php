<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
       'transaction_type_id','target_wallet_id','source_wallet_id','amount','transaction_status_id','target_wallet_balance','source_wallet_balance'
    ];


    /**
     *  get transaction histories of current transaction
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function histories(){
        return $this->hasMany(TransactionHistory::class);
    }

    /**
     * retrieve transaction status object
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(){
        return $this->belongsTo(TransactionStatus::class);
    }

    /**
     * retrieve transaction type object
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(){
        return $this->belongsTo(TransactionType::class);
    }
}
