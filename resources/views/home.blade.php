@extends('layout.app',[
    'page'=>'home'
])
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Welcome {{$user->name}}</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Your ID</label>
                    <div class="col">
                        <span>{{$user->email}}</span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label">Available balance</label>
                    <div class="col">
                        <span>{{$user->wallet->available_amount}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('message'))
        <x-success-modal title="Success" open="true"> {{ session('message') }}</x-success-modal>
    @endif
@endsection
