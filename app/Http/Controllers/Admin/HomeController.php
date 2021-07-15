<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\Drug_cat;
use App\Models\Pharm;
use App\Models\User;
use App\Models\User_role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    public function home()
    {   
        $pharmacistRoleId = User_role::select('id')->where('role','Pharmacist')->first();
        $adminRoleId = User_role::select('id')->where('role','Admin')->first();
        $superAdminRoleId = User_role::select('id')->where('role','Super Admin')->first();
        $adminsNum = User::where('role_id', $superAdminRoleId['id'])->orWhere('role_id', $adminRoleId['id'])->count();
        $pharmacistsNum = User::where('role_id', $pharmacistRoleId['id'])->count();
        $drugsNum = Drug::get()->count();
        $drugCatsNum = Drug_cat::get()->count();
        $pharmsNum = Pharm::get()->count();
        
        return view("admin.home",[
            'adminsNum'=>$adminsNum,
            'usersNum'=>$pharmacistsNum,
            'drugsNum'=>$drugsNum,
            'drugCatsNum'=>$drugCatsNum,
            'pharmsNum'=>$pharmsNum,
        ]);
    }
}
