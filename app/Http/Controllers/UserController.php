<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function profile()
    {
        $user = Auth()->user();
        $porfolio = $user->portfolio;

        return view('blade.profile.edit.profile', [
            'user' => $user,
            'porfolio' => $porfolio,
        ]);
    }

    public function profileUpdate(Request $request)
    {
        dd($request);
    }

    public function customization()
    {
        return view('blade.profile.edit.cusomization');
    }

    public function customizationUpdate(Request $request)
    {
        dd($request);
    }

    public function account()
    {
        return view('blade.profile.edit.account');
    }

    public function accountUpdate(Request $request)
    {
        dd($request);
    }


}
