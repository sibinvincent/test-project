@extends('layout.app',[
    'page'=>'statement'
])
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Welcome {{$user->name}}</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Datetime</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Details</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody class="table-tbody">
                    @if($transactions->isEmpty())
                        <tr>
                            <td colspan="7">{{__('messages.transaction.empty')}}</td>
                        </tr>
                    @else
                    @foreach($transactions as $i => $transaction)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{Illuminate\Support\Carbon::create($transaction->created_at)->format('m-d-Y h:i A')}}</td>
                        <td>{{$transaction->amount}}</td>
                        <td>{{$transaction->target_email === $user->email ? 'Credit' : 'Debit'}}</td>
                        <td data-date="1628071164">
                            @if($transaction->transaction_type_id ===\App\Models\TransactionType::TRANSFER)
                                @if($transaction->target_email=== $user->email)
                                    Transfer from {{$transaction->source_email}}
                                @else
                                    Transfer to {{$transaction->target_email}}
                                @endif
                            @else
                                {{ucfirst($transaction->type_name)}}
                            @endif
                        </td>
                        <td class="sort-quantity">{{$transaction->target_email === $user->email ? $transaction->target_wallet_balance : $transaction->source_wallet_balance}}</td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                {{$transactions->links()}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
