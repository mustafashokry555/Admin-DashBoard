<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Drug;
use App\Models\Drug_cat;
use App\Models\User;
use App\Models\User_role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Drug Cats
        $row = 1;
        if (($handle = fopen(base_path("public/db/Drug Cats.csv"), "r")) !== false) 
        {
            while (($data = fgetcsv($handle, 0, ",")) !== false) 
            {
                if ($row === 1) {
                    $row++;
                    continue;
                }
                $row++;
                
                Drug_cat::firstOrCreate(
                    ['uses' => $data[1]],
                    ['id' =>$data[0], 'side_effects' => $data[2], 'not_use' => $data[3]]
                );
            }
        }

        //Admin Role
       /* User_role::create(
            ['role' => "Admin"]
        );*/

        //Admin
        // User::create(
        //     [
        //         'name' => "Mustafa Shokry",
        //         'email' => "mustafashokry555@gmail.com",
        //         'password' => Hash::make('123456'),
        //         'phone' => "01157479852",
        //         'role_id' => 1
        //     ]
        // );
        
        // $user_id = User::select('id')->where('email', "mustafashokry555@gmail.com")->Where('role_id',1)->get();
        // Admin::create(
        //     [
        //         'user_id' => $user_id[0]['id'],
        //         'is_super' => true
        //     ]
        // );

        //Drugs
        $row1 = 1;
        if (($handle = fopen(base_path("public/db/Drugs.csv"), "r")) !== false) 
        {
            while (($data = fgetcsv($handle, 0, ",")) !== false) 
            {
                if ($row1 === 1) {
                    $row1++;
                    continue;
                }
                $row1++;
                
                Drug::create([
                    'name' => $data[0],
                    'form' =>$data[1],
                    'price' => $data[2],
                    'composition' => $data[4],
                    'user_id' => $data[5],
                    'drug_cat_id' => $data[6]
                ]);
            }    
        }


    }
}
