<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\File;

class LoginWithSocialiteController extends Controller
{

    /**
     * redirect to the google drover
     */
     public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * get the user from google and check if exist login if do not exist create new
     */
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect("/");
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => bcrypt('videochat@123'),
                    'social_path' => $user->avatar_original
                ]);
      
                Auth::login($newUser);
      
                return redirect("/");
            }
      
        } catch (Exception $e) {
            dd($e->getMessage()."kk");
        }
    }

    /**
     * redirect user from twitter driver
     */
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * create new account if don't exists
     */
    public function handleTwitterCallback()
    {
        try {
      
            $user = Socialite::driver('twitter')->user();
            $finduser = User::where('twitter_id', $user->id)->first();

            if($finduser){
       
                Auth::login($finduser);
      
                return redirect("/");
       
            }else{
                if(!empty($user->getAvatar()))
                {

                    $fileContents = file_get_contents($user->getAvatar());
                    File::put(public_path('images/avatar') .'/'. $user->getId() . ".jpg", $fileContents);


                }
                $imageUrl = $user->getId() . ".jpg";
                $newUser = User::create([
                    'name' => $user->name,
                    'twitter_id'=> $user->id,
                    'image' => $imageUrl,
                    'password' => bcrypt('videochat@123'),
                ]);
      
                Auth::login($newUser);
      
                return redirect("/");
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
