<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\Pharm_drug;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

// find Similer Drugs
function similer($drugId)
{
    //similer
    $drug = DB::select('SELECT id, name, drug_cat_id, JSON_QUERY(composition, "$.comp")
        AS comp FROM drugs WHERE id = '. $drugId.' LIMIT 1');
        $name = $drug[0]->name;
        $uses = $drug[0]->drug_cat_id;
        $myComps = json_decode($drug[0]->comp, false);
        $drugs = Drug::select('id', 'name', 'composition', 'drug_cat_id')
        ->where('drug_cat_id',$uses)
        ->get();
        $idS = array();
        foreach($drugs as $d)
        {
            if($d->name != $name)
            {
                $i = 0;
                $j = 0;
                $z = 0;
                $comps = json_decode($d->composition, false);
                foreach($myComps as $myComp)
                {
                    $i++;
                    foreach($comps->comp as $comp)
                    {
                        if($myComp->name == $comp->name)
                        {
                            $j++;
                        }
                        $z++;
                    }
                }
                if($i == $j && $i == $z/$i)
                {
                    $idS [] = Drug::select('id', 'name', 'form', 'price')
                    ->where('id',$d->id)
                    ->first();
                }
            }
        }
        usort($idS, function($a, $b) { //Sort the array using a user defined function
            return $a->name < $b->name ? -1 : 1; //Compare the scores
        });
        return $idS;
}

//search
function search($request)
{
    $input = Validator::make($request->all(), [
        'search' => 'required|string',
    ]);
    if(! $input->fails())
    {
        $drugs = Drug::select('id', 'name', 'form', 'price')
        ->where('name','LIKE','%'.$request->search.'%')
        ->orderBy('name', 'ASC')
        ->get();
        return $drugs;
    }
}

//more info
function drug($drug_id)
{
    $drug = Drug::select('drugs.id', 'drugs.name', 'drugs.form', 'drugs.price', 'drugs.composition',
    'drug_cats.uses', 'drug_cats.side_effects', 'drug_cats.not_use')
    ->where('drugs.id',$drug_id)
    ->join('drug_cats', 'drug_cat_id', '=', 'drug_cats.id')
    ->first();
    $comp = json_decode($drug->composition, false);
    $drug->composition =  $comp->comp;
    return $drug;

}


class DrugController extends Controller
{
    //////////////////////////////////////For Gest
    // find Similer Drugs
    public function similer($drugId)
    {
        return similer($drugId);
    }

    //search
    public function search(Request $request)
    {
        return search($request);
    }
    //more info
    public function drug($drug_id)
    {
        return drug($drug_id);
    }

    //////////////////////////////////////For Users
    //search
    public function search_user($user_id, Request $request)
    {
        $user = User::select()->where('id', $user_id)->first();
        if($user)
        {
            $drugs = search($request);
            foreach ($drugs as $drug) {
                $drug_check = Pharm_drug::select()->where('drug_id', $drug->id)->where('user_id', $user_id)->first();
                if($drug_check)
                {
                    $drug['status'] = 'y';
                }
                else
                {
                    $drug['status'] = 'n';
                }
            }
            return $drugs;
        }
        return 'not a user';
    }
    
    //more info
    public function drug_user($user_id, $drug_id)
    {
        $user = User::select()->where('id', $user_id)->first();
        if($user)
        {
            $drug0 = Drug::select()->where('id', $drug_id)->first();
            if ($drug0) 
            {
                $drug = drug($drug_id);
                $drug_check = Pharm_drug::select()->where('drug_id', $drug->id)->where('user_id', $user_id)->first();
                if($drug_check)
                {
                    $drug['status'] = 'y';
                }
                else
                {
                    $drug['status'] = 'n';
                }
                return $drug;
            }
            return 'not a drug';
        }
        return 'not a user';
    }   
    
    // find Similer Drugs
    public function similer_user($user_id, $drug_id)
    {
        $user = User::select()->where('id', $user_id)->first();
        if($user)
        {
            $drug0 = Drug::select()->where('id', $drug_id)->first();
            if ($drug0) 
            {
                $drugs = similer($drug_id);
                foreach ($drugs as $drug) 
                {
                    $drug_check = Pharm_drug::select()->where('drug_id', $drug->id)->where('user_id', $user_id)->first();
                    if($drug_check)
                    {
                        $drug['status'] = 'y';
                    }
                    else
                    {
                        $drug['status'] = 'n';
                    }
                }
                return $drugs;
            }
            return 'not a drug';
        }
        return 'not a user';
    }

    


    public function comp($drug_id)
    {
        $drug = Drug::select('name', 'id', 'form','composition')
        ->where('drugs.id',$drug_id)
        ->first();
        $comp = json_decode($drug->composition, false);
        $drug->composition =  $comp->comp;
        /*foreach($drug->composition as $comp)
        {
            echo $comp->name . " " . $comp
        }*/
        return $drug;
        //echo $drug->composition;
        //echo $drug->composition;
        /*$comps = json_decode($drug->composition, false);
        foreach($comps->comp as $comp)
        {
            echo $comp->name.'<br>';
        }*/

    }


    
}
