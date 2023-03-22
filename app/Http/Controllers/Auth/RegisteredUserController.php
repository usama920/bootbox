<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        event(new Registered($user));
        $user->createAsStripeCustomer();
        Auth::login($user);

//        if (auth()->user()->role_id == 1)
//            return redirect(RouteServiceProvider::AdminHOME);
//        else
        if (!empty($request->cart) && $request->cart)
            $this->cart();
        else
            return redirect(RouteServiceProvider::HOME);
    }
    public function cart()
    {
        return response()->success();
    }
}
