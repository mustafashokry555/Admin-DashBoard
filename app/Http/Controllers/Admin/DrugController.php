<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\Drug_cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// find Similer Drugs
function similer($drug)
{
    //similer
    $name = $drug->name;
    $uses = $drug->drug_cat_id;
    $drugs = Drug::select('id', 'composition')
    ->where('drug_cat_id',$uses)
    ->get();
    $similerDrugs = array();
    foreach($drugs as $similer)
    {
        if($similer->name != $name)
        {
            $i = 0;
            $j = 0;
            $z = 0;
            $similerComp = json_decode($similer->composition, false);
            foreach($drug->composition as $comp)
            {
                $i++;
                foreach($similerComp->comp as $sComp)
                {
                    if($sComp->name == $comp->name)
                    {
                        $j++;
                    }
                    $z++;
                }
            }
            if($i == $j && $i == $z/$i)
            {
                $similerDrug = Drug::select('drugs.id', 'drugs.name', 'drugs.form','drugs.price','drugs.composition',
                'drug_cats.uses')
                ->where("drugs.id",$similer->id)
                ->join('drug_cats', 'drugs.drug_cat_id', '=', 'drug_cats.id')
                ->first();

                $similercomp = json_decode($similerDrug->composition, false);
                $similerDrug->composition =  $similercomp->comp;
                $similerDrugs [] = $similerDrug;  
            }
        }
    }

    return $similerDrugs;
}

class DrugController extends Controller
{

    //Show All Drugs
    public function showDrugs()
    {
        $drugs = Drug::select('drugs.id', 'drugs.name', 'drugs.form','drugs.price','drugs.composition', 'drug_cats.uses')
        ->join('drug_cats', 'drugs.drug_cat_id', '=', 'drug_cats.id')
        ->get();

        foreach($drugs as $drug)
        {
            $comp = json_decode($drug->composition, false);
            $drug->composition =  $comp->comp;
        }
            
        return view("admin.drugs",['drugs'=>$drugs]);
    }


    //Show  Drug with Id
    public function showDrug($drugId)
    {
        $drug = Drug::select('drugs.id', 'drugs.name', 'drugs.form','drugs.price','drugs.composition', 'drugs.created_at',
        'drug_cats.uses', 'drugs.drug_cat_id', 'drug_cats.side_effects', 'drug_cats.not_use', 'users.name as adminName')
        ->where("drugs.id",$drugId)
        ->join('drug_cats', 'drugs.drug_cat_id', '=', 'drug_cats.id')
        ->join('users', 'drugs.user_id', '=', 'users.id')
        ->first();
        
        $drugComp = json_decode($drug->composition, false);
        $drug->composition =  $drugComp->comp;
        
        
        $similerDrugs = similer($drug);
        return view("admin.drugDetails", [
            'drug'=>$drug,
            'drugs'=>$similerDrugs
            ]);
    }

    //return cats
    public function addDrug()
    {
        $cats = Drug_cat::select('id','uses')->get();
        return view("admin.addDrug", ['cats'=>$cats]);
    }
    
    //add new Drug
    public function storeDrug(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'form' => 'required|string',
            'price' => 'required',
            'compName.*'=> 'required',
            'uses' => 'required'
        ]);

        $composition = '{"comp":[';
        $i=0;
            foreach($request->compName as $compName)
            {
                if($i == 0)
                {
                    $composition = $composition . '{"name":"'.$compName.'","size":"'.$request->compSize[$i].'"}';
                }
                else
                {
                    $composition = $composition . ',{"name":"'.$compName.'","size":"'.$request->compSize[$i].'"}';
                }
                $i++;
            }
        $composition = $composition . ']}';

            
        Drug::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'form'=>$request->form,
            'composition'=>$composition,
            'user_id'=>Auth::user()->id,
            'drug_cat_id'=>$request->uses
        ]);
        
        return redirect(url('dashboard/drugs'))->with('status', 'Drug has been Created Successfully');
    }

    //show Drug with Id to edit
    public function edit($drugId)
    {
        $drug = Drug::select('drugs.id', 'drugs.name', 'drugs.form','drugs.price','drugs.composition', 'drugs.created_at',
        'drug_cats.uses', 'drug_cats.side_effects', 'drug_cats.not_use')
        ->where("drugs.id",$drugId)
        ->join('drug_cats', 'drugs.drug_cat_id', '=', 'drug_cats.id')
        ->first();
        
        $cats = Drug_cat::select('id','uses')->get();

        $comp = json_decode($drug->composition, false);
        $drug->composition =  $comp->comp;
        
        return view("admin.drugEdit", [
            'drug'=>$drug,
            'cats'=>$cats   
            ]);
    }

    //handel Drug edit
    public function handelEdit($drugId, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'uses' => 'required|string',
            'form' => 'required|string',
            'price' => 'required',
            'compName.*'=> 'required'
        ]);
        $composition = '{"comp":[';
        $i=0;
        foreach($request->compName as $compName)
        {
            if($i == 0)
            {
                $composition = $composition . '{"name":"'.$compName.'","size":"'.$request->compSize[$i].'"}';
            }
            else
            {
                $composition = $composition . ',{"name":"'.$compName.'","size":"'.$request->compSize[$i].'"}';
            }
            $i++;
        }
        $composition = $composition . ']}';

        $drug = Drug::findOrFail($drugId);

        $drug->update([
            'name' => $request->name,
            'form' => $request->form,
            'price' => $request->price,
            'composition' => $composition,
            'drug_cat_id' => $request->uses
        ]);
        return redirect()->back()->with('status', 'Drug has been Updated Successfully');
    }


    //Delete Drug
    public function delete($id)
    {
        Drug::where('id', $id)->delete();
        return redirect()->back()->with('status', 'Drug has been Deleted Successfully');
    }
    
}