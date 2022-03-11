<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = (int)$this->command->ask('How many tasks would you like ?',250);

        $users = User::all();
        $departments = Department::all();

        Task::factory($count)->make()->each(function($task) use ($users, $departments){
            $user_id = $users->random()->id;
            
            $task->user_id = $user_id;
            $task->department_id = $departments->random()->id;
            
            $task->save();
        });

        $this->command->info('Created '.$count.' task.');

    }
}
