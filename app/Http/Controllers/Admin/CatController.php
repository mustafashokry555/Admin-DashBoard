<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drug_cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function showCats()
    {
        $cats = Drug_cat::select('id', 'uses', 'side_effects', 'not_use')->get();
        return view("admin.cats",['cats'=>$cats]);
    }
}
