<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($user_id)
    {
        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
        return response(['massege'=> 'Email has been Verified']);
    }

    public function resend($user_id)
    {
        $user = User::where('id', $user_id);
        if($user->count() > 0)
        {
            $userfirst = User::findOrFail($user_id);
            if($userfirst['email_verified_at'] == null)
            {
                $userfirst->sendEmailVerificationNotification();
                return response(['massege'=> 'Email has been sended']);
            }
            else
            {
                return response(['massege'=> 'Email is Verified']);
            }
        }else
            return response(['massege'=> 'Error 404']);
    }
}
