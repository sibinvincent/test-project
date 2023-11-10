@extends('layout.app',[
    'page'=>'deposit'
])
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form method="post" action="{{route('transactions.store',['transaction_type'=>$transaction_type_id])}}">
                <div class="card-header">
                    <h3 class="card-title">Deposit Money</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror"  value="{{old('amount')}}" placeholder="Enter amount to deposit">
                        @error('amount')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
{{--                    <input type="hidden" name="transaction_type_id" value="{{$transaction_type_id}}">--}}
                </div>
                @csrf
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @if (session('message'))
                <x-success-modal title="Transaction completed" open="true"> {{ session('message') }}</x-success-modal>
            @endif
        </div>
    </div>
@endsection
