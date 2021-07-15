<?php

namespace App\Http\Controllers\ADmin;

use App\Http\Controllers\Controller;
use App\Models\Pharm;
use Illuminate\Http\Request;

class PharmController extends Controller
{
    public function showpharms()
    {
        $pharms = Pharm::select('users.id as userId', 'users.name', 'users.phone','pharm_name')
        ->join('users', 'pharms.user_id', '=', 'users.id')
        ->get();
        return view("admin.pharms",['pharms'=>$pharms]);
    }

     //Delete Drug
    public function delete($id)
    {
        Pharm::where('user_id', $id)->delete();
        return redirect()->back()->with('status', 'Drug has been Deleted Successfully');
    }
}
