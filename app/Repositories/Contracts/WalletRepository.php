<?php


namespace App\Repositories\Contracts;


use App\Models\Wallet;

interface WalletRepository
{
    /**
     * insert wallet row
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param Wallet $wallet
     * @param $data
     * @return mixed
     *  Update wallet details
     */
    public function update(Wallet $wallet,$data);

    /**
     * Update wallet balance by calculating transactions amount
     * @param $wallet
     * @return mixed
     */
    public function updateWalletBalance(&$wallet);


    /**
     * get wallet balance by calculating transactions amount
     * @param $walletId
     * @return mixed
     */
    public function getAvailableBalance($walletId);

    /**
     * Get wallet of a user id
     * @param $userId
     * @return mixed
     */
    public function getUserWallet($userId);
}
