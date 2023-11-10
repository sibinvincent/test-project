<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Notifications\VerifyEmail;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
//use App\Http\Requests\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Show register form
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registerForm(Request $request){

        return view('auth.register',[

        ]);
    }

    /**
     * Save user details while registering the user
     * @param Request $request
     * @return mixed
     */
    public function register(Request $request){
        $request->validate([
            'name'=>'required|max:255|alpha_num',
            'email'=>'required|max:255|email|unique:users',
            'password'=>'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
        ],[
            'password.regex'=>':attribute must be at least 8 characters long, contain at least one letter, number and special character.'
        ]);
        return DB::transaction(function () use ($request) {
                $user = $this->userRepository->create($request->all());
                $user->sendEmailVerificationNotification();
                return redirect(route('auth.login'))->with('message',__('messages.login.success'));

        });
    }

    public function emailVerify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/home')->with('message',__('messages.verification.success'));
    }

    public function emailVerifyNotice(){
        return view('auth.verification-notice');
    }
}
