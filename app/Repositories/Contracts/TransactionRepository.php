<?php


namespace App\Repositories\Contracts;


use App\Models\Transaction;

interface TransactionRepository
{
    /**
     * insert transaction row
     * @param array $data
     * @param $transactionType
     * @return \App\Models\Transaction
     */
    public function create($data,$transactionType);

    /**
     * fetch transaction row by id
     * @param array $data
     * @return \App\Models\Transaction
     */
    public function find($id);

    /**
     * @param $filters
     * @return mixed
     */
    public function getAll($filters);

    /**
     * @param Transaction $transaction
     * @param $data
     * @return mixed
     *  Update wallet details
     */
    public function update(Transaction $transaction,$data);
}
