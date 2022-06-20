<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        $event_types = [

            ['name' => 'GS WS', 'status' => '1'],
            ['name' => 'GE WS', 'status' => '1'],
            ['name' => 'GS TR', 'status' => '1'],
            ['name' => 'GS CTR', 'status' => '1'],
            ['name' => 'GE TR', 'status' => '1'],
            ['name' => 'LUNCH', 'status' => '1'],

        ];

        foreach ($event_types as $event_type) {

            $data_exits = DB::table('event_types')->where('name', $event_type['name'])->count();

            if ($data_exits == 0) {
                DB::table('event_types')->insert([
                    'name' => $event_type['name'],
                    'status' => $event_type['status'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        $users = [
<<<<<<< HEAD
            ['name' => 'Praven Siri', 'email' => 'admin@mediastep.com', 'role' => 'admin', 'status' => '1', 'password' => '12345678', 'image' => '1'],
            ['name' => 'Nguyen Phuc Bich', 'email' => 'bich.phuc@mediastep.com', 'role' => 'admin', 'status' => '1', 'password' => '12345678', 'image' => '2'],
            ['name' => 'Nguyen Hoai Lam', 'email' => 'designer@mediastep.com', 'role' => 'designer', 'status' => '1', 'password' => '12345678', 'image' => '2'],
            ['name' => 'Tien Nam', 'email' => 'content@mediastep.com', 'role' => 'content_writer', 'status' => '1', 'password' => '12345678', 'image' => '3'],
        ];

        foreach ($users as $user) {

=======
            ['name' => 'Praven Siri', 'email' => 'admin@mediastep.com', 'role' => 'admin', 'status' => '1', 'password' => '12345678', 'image' => 'public/EMJ4SgDmVNrSV7mbnL2wmygqa5yxOFRCbX9vZL55.jpg'],
            ['name' => 'Nguyen Phuc Bich', 'email' => 'dev@mediastep.com', 'role' => 'developer', 'status' => '1', 'password' => '12345678', 'image' => 'public/hudOocLHtZ0Fx2w8q8qn0esfLm5TCqpnatCy2N3q.jpg'],
            ['name' => 'Nguyen Hoai Lam', 'email' => 'designer@mediastep.com', 'role' => 'designer', 'status' => '1', 'password' => '12345678', 'image' => 'public/iDpPpR0qC1QlGuM0y2SnsCUJB474HZwVD9QbiWwb.jpg'],
            ['name' => 'Tien Nam', 'email' => 'content@mediastep.com', 'role' => 'content_writer', 'status' => '1', 'password' => '12345678', 'image' => 'public/iDpPpR0qC1QlGuM0y2SnsCUJB474HZwVD9QbiWwb.jpg'],
        ];

        foreach ($users as $user) {

>>>>>>> 208e7fb625f737de22fb867fe113b05a44f35465
            $data_exits = DB::table('users')->where('name', $user['name'])->count();

            if ($data_exits == 0) {
                DB::table('users')->insert([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'status' => $user['status'],
                    'password' => Hash::make('12345678'),
                    'image' => $user['image'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
        $tasks = [
            ['name' => 'Taks 1', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Taks 2', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '2'],
            ['name' => 'Taks 3', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Taks 4', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Taks 5', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '2'],
            ['name' => 'Taks 6', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Taks 7', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Taks 8', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Taks 9', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Taks 10', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Taks 11', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
        ];
<<<<<<< HEAD

        foreach ($tasks as $task) {

            $data_exits = DB::table('tasks')->where('name', $task['name'])->count();

=======

        foreach ($tasks as $task) {

            $data_exits = DB::table('tasks')->where('name', $task['name'])->count();

>>>>>>> 208e7fb625f737de22fb867fe113b05a44f35465
            if ($data_exits == 0) {
                DB::table('tasks')->insert([
                    'name' => $task['name'],
                    'description' => $task['description'],
                    'deadline' => $task['deadline'],
                    'status' => $task['status'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }



        $steps = [
            ['name' => 'Step 1', 'assigned_to' => '2', 'task_id' => '1', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Step 2', 'assigned_to' => '3', 'task_id' => '2', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '2'],
            ['name' => 'Step 3', 'assigned_to' => '4', 'task_id' => '3', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '3'],
            ['name' => 'Step 4', 'assigned_to' => '2', 'task_id' => '4', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Step 5', 'assigned_to' => '3', 'task_id' => '5', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '2'],
            ['name' => 'Step 6', 'assigned_to' => '4', 'task_id' => '6', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '3'],
            ['name' => 'Step 7', 'assigned_to' => '2', 'task_id' => '7', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Step 8', 'assigned_to' => '3', 'task_id' => '8', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '2'],
            ['name' => 'Step 9', 'assigned_to' => '4', 'task_id' => '1', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '3'],
            ['name' => 'Step 10', 'assigned_to' => '2', 'task_id' => '2', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '1'],
            ['name' => 'Step 11', 'assigned_to' => '3', 'task_id' => '3', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '2'],
            ['name' => 'Step 12', 'assigned_to' => '4', 'task_id' => '4', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed numquam magni illum reiciendis facere dolor blanditiis, consequuntur perspiciatis rerum nostrum? Fugiat soluta dolore accusantium aperiam totam aliquid asperiores assumenda omnis?', 'deadline' => '2022-06-14 10:24:00', 'status' => '3'],
        ];
<<<<<<< HEAD

        foreach ($steps as $step) {

            $data_exits = DB::table('steps')->where('name', $step['name'])->count();

=======

        foreach ($steps as $step) {

            $data_exits = DB::table('steps')->where('name', $step['name'])->count();

>>>>>>> 208e7fb625f737de22fb867fe113b05a44f35465
            if ($data_exits == 0) {
                DB::table('steps')->insert([
                    'name' => $step['name'],
                    'task_id' => $step['task_id'],
                    'status' => $step['status'],
                    'assigned_to' => $step['assigned_to'],
                    'description' => $step['description'],
                    'deadline' => $step['deadline'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
        

<<<<<<< HEAD
        // $events = [
        //     ['title' => 'workshop export', 'duration' => '2', 'event_type' => '1',  'keyperson' => '1', 'description' => 'workshop goxport 1', 'date' => '2022-06-14 10:24:00', 'status' => '1'],
        // ];

        // foreach ($events as $event) {

        //     $data_exits = DB::table('events')->where('title', $event['title'])->count();

        //     if ($data_exits == 0) {
        //         DB::table('events')->insert([
        //             'title' => $event['title'],
        //             'description' => $event['description'],
        //             'date' => $event['date'],
        //             'duration' => $event['duration'],
        //             'keyperson' => $event['keyperson'],
        //             'status' => $event['status'],
        //             'event_type' => $event['event_type'],
        //             'created_at' => date('Y-m-d H:i:s'),
        //             'updated_at' => date('Y-m-d H:i:s'),
        //         ]);
        //     }
        // }
=======
        $events = [
            ['title' => 'workshop export', 'duration' => '2', 'event_type' => '1',  'keyperson' => '1', 'description' => 'workshop goxport 1', 'date' => '2022-06-14 10:24:00', 'status' => '1'],
        ];

        foreach ($events as $event) {

            $data_exits = DB::table('events')->where('title', $event['title'])->count();

            if ($data_exits == 0) {
                DB::table('events')->insert([
                    'title' => $event['title'],
                    'description' => $event['description'],
                    'date' => $event['date'],
                    'duration' => $event['duration'],
                    'keyperson' => $event['keyperson'],
                    'status' => $event['status'],
                    'event_type' => $event['event_type'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
>>>>>>> 208e7fb625f737de22fb867fe113b05a44f35465
    }
}
