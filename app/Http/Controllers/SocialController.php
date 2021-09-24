<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Auth;

use Exception;
use Socialite;
use Validator;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;


class SocialController extends Controller
{

    /*---------GOOOGLE-----------*/  //Done
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }
            else
            {
                $user_in_db = User::where('email', $user->email);
                $user_db = $user_in_db->first();

                //if user email doesnt exist
                if($user_in_db->count() == 0)
                {
                    $role_id = Role::where('name', 'creator')->first()->id;

                    $createUser = User::create([
                        'name'  => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'role_id'   => $role_id,
                        'auth_type' => 'google',
                        'password'  => encrypt('admin@123')
                    ]);

                    $profile = new Profile();
                    $profile->user_id = $createUser->id;
                    $profile->nickname = $createUser->name;
                    $profile->save();


                    Auth::login($createUser);
                }
                //if user email does exist
                else
                {
                    $user_db->google_id = $user->id;
                    if($user_db->auth_type == NULL)
                    {
                        $user_db->auth_type = 'google';
                    }
                    else
                    {
                        $user_db->auth_type = $user_db->auth_type . ', google';
                    }
                    $user_db->save();
                    Auth::login($user_db);
                }

                return redirect('/');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }


    /*---------GITHUB-----------*/ //DONE
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }


    public function gitCallback()
    {
        try {

            $user = Socialite::driver('github')->user();

            $searchUser = User::where('github_id', $user->id)->first();

            if($searchUser){
                Auth::login($searchUser);
                return redirect('/');

            }
            else
            {
                $user_in_db = User::where('email', $user->email);
                $user_db = $user_in_db->first();

                //if user email doesnt exist
                if($user_in_db->count() == 0)
                {
                    $role_id = Role::where('name', 'creator')->first()->id;
                    $gitUser = User::create([
                        'name'  => $user->name,
                        'email' => $user->email,
                        'github_id' => $user->id,
                        'role_id'   => $role_id,
                        'auth_type' => 'github',
                        'password'  => encrypt('gitpwd059')
                    ]);

                    $profile = new Profile();
                    $profile->user_id = $gitUser->id;
                    $profile->nickname = $gitUser->name;
                    $profile->save();

                    Auth::login($gitUser);
                }
                //if user email does exist
                else
                {
                    $user_db->github_id = $user->id;
                    if($user_db->auth_type == NULL)
                    {
                        $user_db->auth_type = 'github';
                    }
                    else
                    {
                        $user_db->auth_type = $user_db->auth_type . ', github';
                    }
                    $user_db->save();
                    Auth::login($user_db);
                }
                return redirect('/');
            }


        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    /*---------LINKEDIN-----------*/
    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }


    public function linkedinCallback()
    {
        try {

            $user = Socialite::driver('linkedin')->user();

            $linkedinUser = User::where('oauth_id', $user->id)->first();

            if($linkedinUser){

                Auth::login($linkedinUser);

                return redirect('/');

            }else
            {
                $role_id = Role::where('name', 'creator')->first()->id;
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'linkedin_id' => $user->id,
                    'auth_type' => 'linkedin',
                    'role_id' => $role_id,
                    'password' => encrypt('admin12345')
                ]);
                $profile = Profile::create([
                    'nickname' => $user->name,
                ]);
                Auth::login($user);

                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /*---------FACEBOOK-----------*/
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function facebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $searchUser = User::where('facebook_id', $user->id)->first();

            if($searchUser){
                Auth::login($searchUser);
                return redirect('/');

            }else{
                $user_in_db = User::where('email', $user->email);
                $user_db = $user_in_db->first();

                //if user email doesnt exist
                if($user_in_db->count() == 0)
                {
                    $gitUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'facebook_id'=> $user->id,
                        'auth_type'=> 'facebook',
                        'password' => encrypt('gitpwd059')
                    ]);
                    $profile = Profile::create([
                        'nickname' => $gitUser->name,
                    ]);
                    Auth::login($gitUser);
                }
                //if user email does exist
                else
                {
                    $user_db->facebook_id = $user->id;
                    if($user_db->auth_type == NULL)
                    {
                        $user_db->auth_type = 'facebook';
                    }
                    else
                    {
                        $user_db->auth_type = $user_db->auth_type . ', facebook';
                    }
                    $user_db->save();
                    Auth::login($user_db);
                }
                return redirect('/');
            }


        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /*---------TWITTER-----------*/
    public function twitterRedirect()
    {
        return Socialite::driver('twitter')->redirect();
    }


    public function twitterCallback()
    {
        try {

            $user = Socialite::driver('twitter')->user();
            $searchUser = User::where('twitter_id', $user->id)->first();

            if($searchUser){
                Auth::login($searchUser);
                return redirect('/');

            }else{
                $user_in_db = User::where('email', $user->email);
                $user_db = $user_in_db->first();

                //if user email doesnt exist
                if($user_in_db->count() == 0)
                {
                    $gitUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'twitter_id'=> $user->id,
                        'auth_type'=> 'twitter',
                        'password' => encrypt('gitpwd059')
                    ]);
                    $profile = Profile::create([
                        'nickname' => $gitUser->name,
                    ]);
                    Auth::login($gitUser);
                }
                //if user email does exist
                else
                {
                    $user_db->twitter_id = $user->id;
                    if($user_db->auth_type == NULL)
                    {
                        $user_db->auth_type = 'twitter';
                    }
                    else
                    {
                        $user_db->auth_type = $user_db->auth_type . ', twitter';
                    }
                    $user_db->save();
                    Auth::login($user_db);
                }
                return redirect('/');
            }


        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
