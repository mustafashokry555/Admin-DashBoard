<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharm;
use App\Models\Pharm_drug;
use App\Models\User;
use App\Models\User_role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Show All pharmacists
    public function showUsers()
    {
        $pharmacistRoleId = User_role::select('id')->where('role','Pharmacist')->first();
        $users = User::select('id', 'name', 'email', 'phone')
        ->where('role_id', $pharmacistRoleId['id'])->get();
        //, 'pharmacists.pharm_name as pharm_name'
        //->join('pharmacists', 'id', '=', 'pharmacists.user_id')
        return view("admin.users",['users'=>$users]);
    }

    //Show All Admins
    public function showAdmins()
    {
        $adminRoleId = User_role::select('id')->where('role','Admin')->first();
        $superAdminRoleId = User_role::select('id')->where('role','Super Admin')->first();
        $admins = User::select('id', 'name', 'email', 'phone')->where('role_id', $superAdminRoleId['id'])
        ->orWhere('role_id', $adminRoleId['id'])->get();;
        return view("admin.admins",['admins'=>$admins, 'superAdminId'=>$superAdminRoleId]);
    }

    public function storeAdmin(Request $input)
    {
        Validator::make($input->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|unique:users|email|max:100',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|string|max:15',
        ])->validate();

        
        $adminRole = User_role::where('role', 'Admin')->first();
        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'], 
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'role_id' => $adminRole->id
            
        ]);
        if ($user)
            return redirect(url('dashboard/admins'))->with('status', 'Admin has been Created Successfully');
    }

    public function userInfo($userId)
    {
        $user = User::select()->where('id', $userId)->first();
        if($user)
        {
            $pharm = Pharm::select()->where('user_id', $userId)->first();
            if($pharm)
            {
                $user['pharm_name'] = $pharm['pharm_name'];
                $user['adress'] = $pharm['adress'];
            }
            return view("admin.userInfo",['user'=>$user]);
        }
        else
        {
            return redirect(url('dashboard'));
        }

    }

    //show User with Id to edit
    public function edit($userId)
    {
        $user = User::select('id', 'name', 'phone','img')
        ->where("id",$userId)
        ->first();
        if ($user) {
            return view("admin.userEdit", ['user'=>$user]);
        }
        return redirect()->back()->with('status', 'User Not exist');        
    }

    //handel User edit
    public function handelEdit($userId, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string'
        ]);
        $user = User::where("id", $userId)->first();
        if ($user) 
        {
            if(Hash::check($request['password'], $user->password))
            {
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->save();
                return redirect()->back()->with('status', 'User has been Updated Successfully');
            }
        }
    }

    //Delete user
    public function delete($id)
    {
        Pharm_drug::where('user_id', $id)->delete();
        Pharm::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
        return redirect()->back()->with('status', 'User has been Deleted Successfully');
    }
}
