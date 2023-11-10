<?php

if(!function_exists('formatTransactionDetails')){
    function formatTransactionDetails($transaction,$user){
        switch ($transaction->transaction_type_id){
            case \App\Models\TransactionType::TRANSFER:
                if ($transaction->target_email=== $user->email)
                    return 'Transfer from '.$transaction->source_email;
                else
                    return 'Transfer to '.$transaction->target_email;
                return 'deposit';
                break;

        }
    }
}
