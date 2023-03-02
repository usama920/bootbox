<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Mail\VerifyConfirmMail;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => User::select('id', 'name', 'email')->where('roles_id', 2)->paginate(5)
        ]);
    }
//    public function account($search = ''): \Inertia\Response
//    {
//        return Inertia::render('Accounts/Index', [
//            'account' => Account::select('ID', 'STATUS', 'ACCOUNT_EMAIL', 'ACCOUNT_NAME', 'COUNTRY')
//                ->when($search, function ($query) use ($search){
//                    $query->where('ACCOUNT_EMAIL', 'LIKE', $search)
//                        ->orWhere('ACCOUNT_NAME', 'LIKE', $search);
//                })
//                ->paginate(10),
//        ]);
//    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return response()->success();
    }
}
