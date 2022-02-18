<?php

namespace Database\Seeders;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Database\Seeder;

class TodoListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = (int)$this->command->ask('How many tasks would you like ?',50);

        $users = User::all();

        TodoList::factory($count)->make()->each(function($task) use ($users){
            $task->user_id = $users->random()->id;
            
            $task->save();
        });

        $this->command->info('Created '.$count.' task.');

    }
}
