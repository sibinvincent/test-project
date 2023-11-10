<?php


namespace App\Repositories\Implementations;
use App\Models\User;
use App\Models\WalletStatus;
use App\Models\WalletType;
use \App\Repositories\Contracts\UserRepository as Contract;


class UserRepository implements  Contract
{

    /**
     * @inheritDoc
     */
    public function create($data){
        $user =  User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>$data['password'],
            'email_verified_at'=>$data['email_verified_at']??now(),
        ]);
        $user->wallets()->create([
            'user_id'=>$user->id,
            'wallet_type_id'=>$data['wallet_type_id']??WalletType::SAVINGS,
            'wallet_status_id'=>$data['wallet_status_id']??WalletStatus::ACTIVE,
            'available_amount'=>$data['available_amount']??0,
        ]);
        return $user;
    }
    /**
     * @inheritDoc
     */
    public function find($id)
    {
        return User::find($id);
    }

    /**
     * @inheritDoc
     */
    public function findByEmail($email,$relations=[])
    {
        return User::with($relations)->where('email',$email)->first();
    }
}
