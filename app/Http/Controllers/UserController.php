<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmailCode;
use App\Models\NotVerifyUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    
    /**
     * register user
     * @param $request
     */
    public function registerUser(Request $request){
        $data = [
            'name' => ['required', 'string', 'max:32',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:not_verify_users',"unique:users"],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $check = Validator::make($request->all(),$data);
        if(!$check->fails()){
            try{
                $not_v_user = NotVerifyUser::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
        
                ]);
                $email = $request->email;
                $name = $request->name;
                $id   = $not_v_user->id;
                Mail::to($email)->send(new VerifyEmailCode($email,$name,$id));
                return view("auth.verifyviewuser",compact('email','name','id'));
            }
            catch(Exception $er){
                return $er;
            }
        }
        else{
            return back()->with(["errors" => $check->errors()]);
        }
    }

    /**
     * send email 
     * @param $id,$name,$email
     */
    public function sendEmail($email,$name,$id)
    {
        Mail::to($email)->send(new VerifyEmailCode($email,$name,$id));
            return view("auth.verifyviewuser",compact('email','name','id'));
    }

    /**
     * After click to verify message in email call this function
     * @param $email,$id
     */
    public function registerVerifyUser($email,$id){
        $not_v_user = NotVerifyUser::find($id);
        if($not_v_user != ""){
            $user = User::create([
                'password' => $not_v_user->password,
                'name' => $not_v_user->name,
                'email' => $email,
            ]);

            $not_v_user->delete();
            Auth::login($user);
      
            return redirect("/");
        }
        else{
            return "errors";
        }
    }

    /**
     * logout user and response success logout
     */
    public function logoutUser(){
        Auth::logout();
        return redirect("/");
    }
}
