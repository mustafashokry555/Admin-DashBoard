<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Pharm;
use App\Models\User;
use App\Models\User_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    
    
    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|unique:users|email|max:100',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|string|max:15',
        ]);

        $user = User::where('email', $request['email'])->first();
        if($user)
        {
            return json_encode('account already exists');
        }
        if($request['password'] == $request['password_confirmation'])
        {
            $pharmRole = User_role::where('role', 'Pharmacist')->first();
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'phone' => $request['phone'],
                'role_id' => $pharmRole->id
            ]);
            $user->sendEmailVerificationNotification();
    
            $token = $user->createToken('appToken')->plainTextToken;

            $user = User::select('id', "name", "email", "phone")
                    ->where('email', $request['email'])->first();
            
            DB::select("UPDATE users SET email_verified_at = '2021-07-09 21:45:37' WHERE id = ". $user->id);
    
            return $user;
        }
    }

    //////////////////////////
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            'massege'=> 'logged out'
        ]);
    }

    public function login(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        

        $user = User::where('email', $request['email'])->first();
        if(!$user)
        {
            return json_encode("not exist");
        }
        elseif(!Hash::check($request['password'], $user->password))
        {
            return json_encode("not password");
        }
        $pharm = Pharm::where('user_id',$user->id)->first();
        if($pharm)
        {
            $user = User::select('users.id', 'name', 'email', 'phone', 'img', 'pharms.pharm_name', 'pharms.adress')
            ->join('pharms', 'users.id', '=', 'pharms.user_id')
            ->where('email', $request['email'])->first();
            $user['status'] = 'y';
        }
        else
        {
            $user = User::select('id', 'name', 'email', 'phone', 'img')
            ->where('email', $request['email'])->first();
            $user['pharm_name'] = null;
            $user['adress'] = null;
            $user['status'] = 'n';
            
        }
        if($user['img'] != null)
        {
            $image_file = 'uploads/'.$user['img'];
            $string = file_get_contents($image_file);
            $string = base64_encode($string);
            $user['img'] = $string;
        }
        return $user;
    }


    
    public function updateUserInfo($userId, Request $request)
    {
        $user = User::where("id", $userId)->first();
        if ($user) 
        {
            if(!Hash::check($request['password'], $user->password))
            {
                return json_encode("not password");
            }
            $user = User::select('id', 'name', 'email', 'phone', 'img')->where("id", $userId)->first();
            $pharm = Pharm::select()->where('user_id', $userId)->first();
            $user->name = $request->name;
            $user->phone = $request['phone'];
            $pharm->pharm_name = $request['pharm_name'];
            $pharm->adress = $request['adress'];
            $user->save();
            $pharm->save();
            if ($user['img'] != null) 
            {
                $image_file = "uploads/$user->img";
                if($image_file)
                {
                    $user->img = $userId .".png";
                    $string = file_get_contents($image_file);
                    $string = base64_encode($string);
                    $user->img = $string;
                }
                else{
                    $user->img = null;
                }
            }
            $user->pharm_name = $request['pharm_name'];
            $user->adress = $request['adress'];
            $user['status'] = 'y';
            return $user;
        }
    }


}