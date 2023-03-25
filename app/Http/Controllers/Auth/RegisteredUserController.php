<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMail;
use App\Mail\TwoStepVerifyMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'roles_id' => 2,
            'password' => Hash::make($request->password),
        ]);

        $code = ['code'=>Str::random(6)];
        $request->session()->put('verification_code', $code);
        $request->session()->put('user_email', $user->email);

        event(new Registered($user));
        $user->createAsStripeCustomer();
//        Auth::login($user);

        Mail::to($user->email)->send(new TwoStepVerifyMail($code));
        if (!empty($request->cart) && $request->cart)
            $this->cart();
        else
            return Inertia::render('Auth/AccountVerify');

//            return redirect(RouteServiceProvider::HOME);
    }
    public function cart()
    {
        return response()->success();
    }

    public function verify(Request $request){
        $request->validate([
           'code'=>'required'
        ]);
        $code = $request->session()->get('verification_code');
        $email = $request->session()->get('user_email');
        if(empty($code) || empty($email)){
            return response()->error('Verification Code Expired!', 400);
        }else{
            $request->session()->forget('verification_code');
            $request->session()->forget('user_email');

            if($request->code === $code['code']){
                $user= User::where(['email'=>$email])->first();
                $user->update(['email_verified_at'=>now()]);
                Auth::login($user);
                return response()->success();
            } else
                return response()->error('Validation Failed!', 403);
        }
    }

    public function verificationCode()
    {
        $user = auth()->user();
        $code = ['code'=>Str::random(6)];
        Session::put('verification_code', $code);
        Session::put('user_email', $user->email);
        Mail::to($user->email)->send(new TwoStepVerifyMail($code));

        return response()->success();
    }
}
