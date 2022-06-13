<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $event_types = [

            ['name'=>'GS WS','status'=>'1'],
            ['name'=>'GE WS','status'=>'1'],
            ['name'=>'GS TR','status'=>'1'],
            ['name'=>'GS CTR','status'=>'1'],
            ['name'=>'GE TR','status'=>'1'],
            ['name'=>'LUNCH','status'=>'1'],

        ];

        foreach($event_types as $event_type){

            $data_exits = DB::table('event_types')->where('name',$event_type['name'])->count();

            if($data_exits == 0){
                DB::table('event_types')->insert([
                    'name' => $event_type['name'],
                    'status' => $event_type['status'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ]);
            }


           
        }
       
       





    }
}
