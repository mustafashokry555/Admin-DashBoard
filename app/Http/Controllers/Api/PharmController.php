<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\Pharm;
use App\Models\Pharm_drug;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmController extends Controller
{
    //Add New Pharm
    public function addPharms($user_id, Request $request)
    {
        $pharm = Pharm::create([
            'user_id' => $user_id,
            'pharm_name' => $request['pharm_name'],
            'adress' => $request['pharm_adress'],
            'latitude' => $request['latitude'],
            'longtude' => $request['longtude'],
        ]);
        return json_encode('true');
    }

    //Show All Drugs
    public function allDrugs($user_id)
    {
        $user = User::select('name')->where("id", $user_id)->first();
        if ($user)
        {
            $pharm = Pharm::select()->where("user_id", $user_id)->first();
            if ($pharm) 
            {
                // drug_cat_id, name ASC
                $drugs = Drug::select('id', 'name', 'form')->orderBy('drug_cat_id', 'ASC')->orderBy('name', 'ASC')->get();
                foreach ($drugs as $drug) 
                {
                    $thisDrug = Pharm_drug::select()->where("user_id", $user_id)->where("drug_id", $drug['id'])->first();
                    if ($thisDrug) 
                    {
                        $drug['status'] = 'y';
                    } else 
                    {
                        $drug['status'] = 'n';
                    }
                }
                return $drugs;
            }
            return "not a pharm";
        }
        return "not a user";
    }

    //Show All Pharm Drugs
    public function allPharmDrugs($user_id)
    {
        $user = User::select('name')->where("id", $user_id)->first();
        if ($user)
        {
            $pharmDrugs = Pharm_drug::select('drugs.id', 'drugs.name', 'drugs.form', 'drugs.price')
            ->where('pharm_drugs.user_id', $user_id)
            ->join('drugs', 'pharm_drugs.drug_id', '=', 'drugs.id')
            ->orderBy('drugs.drug_cat_id', 'ASC')->orderBy('name', 'ASC')
            ->get();
            return $pharmDrugs;
        }
        return "not a user";
    }

    //Add New Drug to the Pharm
    public function addDrug($user_id, $drug_id)
    {
        $user = User::select('name')->where("id", $user_id)->first();
        if ($user) {
            $pharm_id = Pharm::select('id')->where("user_id", $user_id)->first();
            if ($pharm_id) {
                $drug = Drug::select('name')->where("id", $drug_id)->first();
                if ($drug) {
                    $thisDrug = Pharm_drug::select()->where("user_id", $user_id)->where("drug_id", $drug_id)->first();
                    if ($thisDrug) {
                        return "already exists";
                    }
                    Pharm_drug::create([
                        'user_id' => $user_id,
                        'drug_id' => $drug_id,
                    ]);
                    return json_encode("Done");
                }
                return "not a drug";
            }
            return "not a pharm";
        }
        return "not a user";
    }

    //Delete Drug from the Pharm
    public function deleteDrug($user_id, $drug_id)
    {
        $user = User::select('name')->where("id", $user_id)->first();
        if ($user) {
            $pharm_id = Pharm::select('id')->where("user_id", $user_id)->first();
            if ($pharm_id) {
                $drug = Drug::select('name')->where("id", $drug_id)->first();
                if ($drug) {
                    $thisDrug = Pharm_drug::select()->where("user_id", $user_id)->where("drug_id", $drug_id)->first();
                    if ($thisDrug) {
                        Pharm_drug::where('drug_id', $drug_id)->where('drug_id', $drug_id)->delete();
                        return json_encode("Done");
                    }
                    return "already deleted";
                }
                return "not a drug";
            }
            return "not a pharm";
        }
        return "not a user";
    }

    //Get near Pharm Location
    public function getLoc($drug_id, Request $request)
    {
        $drug = Drug::select('name')->where("id", $drug_id)->first();
        if ($drug)
        {
            $users = Pharm_drug::select('user_id')->where('drug_id', $drug_id)->get();
            if($users)
            {
                $pharms = array();
                foreach ($users as $user) 
                {
                    $pharm = DB::select('SELECT * FROM (
                        SELECT *,
                            (
                                (
                                    (
                                        acos(
                                            sin(( '.$request["latitude"].' * pi() / 180))
                                            *
                                            sin((latitude * pi() / 180)) + cos(( '.$request["latitude"].' * pi() /180 ))
                                            *
                                            cos(( latitude * pi() / 180)) * cos((( longtude - '.$request["longtude"].') * pi()/180)))
                                    ) * 180/pi()
                                ) * 60 * 1.1515 * 1.609344
                            )
                        as distance FROM pharms
                    ) myTable
                    WHERE distance <= 1 and user_id = '. $user['user_id'] . ' LIMIT 1');
                    if ($pharm) {
                        $user_idt = User::select('phone', 'name')->where('id', $user['user_id'])->first();
                        foreach ($pharm as $p) {
                            $p->user_name = $user_idt['name'];
                            $p->user_phone = $user_idt['phone'];
                        }
                        $pharms[] = $pharm[0];
                    }
                }
                usort($pharms, function($a, $b) { //Sort the array using a user defined function
                    return $a->distance < $b->distance ? -1 : 1; //Compare the scores
                });                                                                                                                                                                                                        
                
                return $pharms;
            }
            return "not a user";
        }
        return "not a Drug";
    }

    //Get All Pharm Location
    public function getAllLoc($drug_id, Request $request)
    { 
        $drug = Drug::select('name')->where("id", $drug_id)->first();
        if ($drug)
        {
            $users = Pharm_drug::select('user_id')->where('drug_id', $drug_id)->get();
            if($users)
            {
                $pharms = array();
                foreach ($users as $user) 
                {
                    $pharm = DB::select('SELECT * FROM (
                        SELECT *,
                            (
                                (
                                    (
                                        acos(
                                            sin(( '.$request["latitude"].' * pi() / 180))
                                            *
                                            sin((latitude * pi() / 180)) + cos(( '.$request["latitude"].' * pi() /180 ))
                                            *
                                            cos(( latitude * pi() / 180)) * cos((( 31.220473 - '.$request["longtude"].') * pi()/180)))
                                    ) * 180/pi()
                                ) * 60 * 1.1515 * 1.609344
                            )
                        as distance FROM pharms
                    ) myTable
                    WHERE user_id = '. $user['user_id'] . ' LIMIT 1');
                    if ($pharm) {
                        $user_idt = User::select('phone', 'name')->where('id', $user['user_id'])->first();
                        foreach ($pharm as $p) {
                            $p->user_name = $user_idt['name'];
                            $p->user_phone = $user_idt['phone'];
                        }
                        $pharms[] = $pharm[0];
                    }
                }
                // usort($pharms, function($a, $b) { //Sort the array using a user defined function
                //     return $a->distance < $b->distance ? -1 : 1; //Compare the scores
                // });
                return $pharms;
            }
            return "not a user";
        }
        return "not a Drug";

        
    }
    
}