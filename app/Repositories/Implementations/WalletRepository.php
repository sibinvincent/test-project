<?php


namespace App\Repositories\Implementations;

use App\Models\Transaction;
use App\Models\TransactionStatus;
use App\Models\TransactionType;
use App\Models\Wallet;
use App\Models\WalletStatus;
use App\Models\WalletType;
use App\Repositories\Contracts\WalletRepository as Contrast;


class WalletRepository implements Contrast
{

    /**
     * @inheritDoc
     */
    public function create($data)
    {
        return Wallet::create([
            'user_id' => $data['user_id'],
            'wallet_type_id' => $data['wallet_type_id'] ?? WalletType::SAVINGS,
            'wallet_status_id' => $data['wallet_status_id'] ?? WalletStatus::ACTIVE,
            'available_amount' => $data['available_amount'],

        ]);
    }

    /**
     * @inheritDoc
     */
    public function update(Wallet $wallet, $data)
    {
        foreach ($data as $attribute => $datum) {
            $wallet->{$attribute} = $datum;
        }
        $wallet->save();
        return $wallet;
    }

    /**
     * @inheritDoc
     */
    public function updateWalletBalance(&$wallet)
    {
        $wallet->available_amount = $this->getAvailableBalance($wallet->id);
        $wallet->save();
    }



    /**
     * @inheritDoc
     */
    public function getAvailableBalance($walletId)
    {
        return Transaction::where([
                'target_wallet_id' => $walletId,
                'transaction_status_id' => TransactionStatus::COMPLETED
            ])
                ->whereIn('transaction_type_id', [
                    TransactionType::DEPOSIT,
                    TransactionType::TRANSFER
                ])->sum('amount')
            - Transaction::where([
                'source_wallet_id' => $walletId,
                'transaction_status_id' => TransactionStatus::COMPLETED
            ])->whereIn('transaction_type_id', [
                    TransactionType::WITHDRAW,
                    TransactionType::TRANSFER]
            )->sum('amount');
    }

    /**
     * @inheritDoc
     */
    public function getUserWallet($userId)
    {
        return Wallet::where('user_id', $userId)->first();
    }
}
