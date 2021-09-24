<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $user = Auth()->user();
        $porfolio = $user->portfolio;

        return view('blade.profile.myprofile', [
            'user' => $user,
            'porfolio' => $porfolio,
        ]);
    }


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
        $auth = Auth()->user();
        $user = User::find($auth->id);
        $user->name = $request->name;

        if($request->image)
        {
            $response = cloudinary()->upload($request->input('image'))->getSecurePath();
            $user->profile_photo_path = $response;
        }

        $user->save();

        $profile = $auth->profile;
        $profile->nickname = $request->nickname;
        $profile->save();

        Toastr::success('Updated Successfully', ' ', ["positionClass" => "toast-bottom-center"]);
        return back();
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
