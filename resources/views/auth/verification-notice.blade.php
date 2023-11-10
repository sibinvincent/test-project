@extends('layout.app',[
    'page'=>'Email verification'
])
@section('content')
    <div class="empty">
        <div class="empty-img"><img src="{{asset('static/illustrations/undraw_printing_invoices_5r4r.svg')}}" height="128" alt="">
        </div>
        <p class="empty-title">Account Not verified</p>
        <p class="empty-subtitle text-muted">
            Your account not verified, We have sent an email to verify your account, please check your inbox and verify your email
        </p>
    </div>
@endsection
