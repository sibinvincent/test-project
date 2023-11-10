<?php


namespace App\Repositories\Implementations;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use App\Models\TransactionType;
use App\Models\User;
use App\Repositories\Contracts\TransactionRepository as Repository;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class TransactionRepository implements Repository
{


    public function __construct()
    {

    }

    /**
     * @inheritDoc
     */
    public function create($data,$transactionType)
    {
        return Transaction::create([
//            'transaction_type_id'=>$data['transaction_type_id'],
            'transaction_type_id'=>$transactionType->id,
            'target_wallet_id'=>$data['target_wallet_id']??null,
            'source_wallet_id'=>$data['source_wallet_id']??null,
            'amount'=>$data['amount']??0,
            'transaction_status_id'=>$data['transaction_status_id']??TransactionStatus::COMPLETED
        ]);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        return Transaction::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getAll($filters)
    {
        $query = DB::table('transactions')
            ->select('transactions.created_at','amount','type_name','transaction_type_id','transactions.target_wallet_balance','transactions.source_wallet_balance','target_user.email AS target_email','source_user.email AS source_email')
            ->leftJoin('transaction_types','transaction_types.id','transactions.transaction_type_id')
            ->leftJoin('wallets AS source_wallet','source_wallet.id','transactions.source_wallet_id')
            ->leftJoin('wallets AS target_wallet','target_wallet.id','transactions.target_wallet_id')
            ->leftJoin('users AS target_user','target_user.id','target_wallet.user_id')
            ->leftJoin('users AS source_user','source_user.id','source_wallet.user_id');
        if (!empty($filters['user_id'])){
            $query->where(function (Builder $query) use ($filters) {
                $query->where('target_user.id',$filters['user_id'])
                    ->orWhere('source_user.id',$filters['user_id']);
            });
        }
            return $query->paginate(10);
        ;

    }

    /**
     * @inheritDoc
     */
    public function update(Transaction $transaction, $data)
    {
        foreach ($data as $attribute => $datum) {
            $transaction->{$attribute} = $datum;
        }
        $transaction->save();
        return $transaction;
    }
}
