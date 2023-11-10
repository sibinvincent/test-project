<?php


namespace App\Http\Controllers;


use App\Models\Transaction;
use App\Models\TransactionStatus;
use App\Models\TransactionType;
use App\Repositories\Contracts\TransactionRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\WalletRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;
use function Termwind\breakLine;

class TransactionController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    protected $transactionRepository;
    protected $walletRepository;

    public function __construct(UserRepository $userRepository,
                                TransactionRepository $transactionRepository,
                                WalletRepository $walletRepository)
    {
        $this->userRepository = $userRepository;
        $this->transactionRepository = $transactionRepository;
        $this->walletRepository = $walletRepository;
    }

    /**
     * show deposit form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function deposit(){
        return view('deposit',[
            'transaction_type_id'=>TransactionType::DEPOSIT,
        ]);
    }

    /**
     * Show withdrawal form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function withdraw(){
        return view('withdraw',[
            'transaction_type_id'=>TransactionType::WITHDRAW,
        ]);
    }

    /**
     * Show transfer form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function transfer(){
        return view('transfer',[
            'transaction_type_id'=>TransactionType::TRANSFER,
        ]);
    }

    /**
     * Show user statement
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function statement(){
        $transactions  = $this->transactionRepository->getAll([
            'user_id'=>Auth::user()->id
        ]);
        return view('statement',[
            'transactions'=>$transactions,
            'user'=>Auth::user()
        ]);
    }

    /**
     * Save all type of transaction (Deposit, Withdrawal, Transfer)
     * @param Request $request
     * @param TransactionType $transactionType
     * @return mixed
     */
    public function store(Request $request,TransactionType $transactionType){
        $currentWallet = Auth::user()->wallet;
        $request->validate([
           'amount'=>'required|numeric'.(in_array($transactionType->id,[TransactionType::TRANSFER,TransactionType::WITHDRAW])?"|max:$currentWallet->available_amount":''),
           'email'=>[Rule::requiredIf(function () use ($transactionType) {
               return $transactionType->id === TransactionType::TRANSFER;
           }),Rule::exists('users')->whereNot('email',Auth::user()->email)]
        ],[
            'amount.max' => __('messages.insufficient_balance',['value'=>$currentWallet->available_amount]),
            'amount.numeric'=>__('messages.provide_valid',['attribute'=>'amount']),
        ]);
        return DB::transaction(function () use (&$currentWallet, $transactionType, $request) {
            $requestData = $request->only([
                'amount'
            ]);
            $currentIsTarget =false;
            switch ($transactionType->id){
                case TransactionType::TRANSFER:
                    $targetUser = $this->userRepository->findByEmail($request->email,['wallet']);
                    $requestData['target_wallet_id'] = $targetUser->wallet->id;
                    $requestData['source_wallet_id'] = $currentWallet->id;

                    break;
                case TransactionType::DEPOSIT:
                    $requestData['target_wallet_id'] = $currentWallet->id;
                    $currentIsTarget = true;
                    break;
                default:
                    $requestData['source_wallet_id'] = $currentWallet->id;
                    break;
            }

            $requestData['transaction_type_id'] = $transactionType->id;
            $requestData['transaction_status_id'] = TransactionStatus::COMPLETED;

            $transaction = $this->transactionRepository->create($requestData,$transactionType);

            $this->walletRepository->updateWalletBalance($currentWallet);
            if($currentIsTarget){
                $transaction->target_wallet_balance = $currentWallet->available_amount;
            } else {
                $transaction->source_wallet_balance = $currentWallet->available_amount;
            }
            if (!empty($targetUser)){
                $this->walletRepository->updateWalletBalance($targetUser->wallet);
                $transaction->target_wallet_balance = $targetUser->wallet->available_amount;
            }
            $this->transactionRepository->update($transaction,[]);

            return redirect()->back()->with([
                'message'=>Lang::get('messages.transaction.complete',[
                    'type'=>ucfirst($transactionType->type_name),
                    'amount'=>$currentWallet->available_amount
                ])
            ]);

        });

    }

}
