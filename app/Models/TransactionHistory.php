<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    /**
     * retrieve transaction entity
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    /**
     * retrieve transaction status object
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(){
        return $this->belongsTo(TransactionStatus::class);
    }
}
