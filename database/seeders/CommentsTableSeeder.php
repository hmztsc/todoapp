<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = (int)$this->command->ask('How many comments would you like ?',50);

        $users = User::all();
        $tasks = Task::all();

        Comment::factory($count)->make()->each(function($comment) use ($users, $tasks) {
            $comment->user_id = $users->random()->id;
            $comment->task_id = $tasks->random()->id;
            
            $comment->save();
        });

        $this->command->info('Created '.$count.' comment.');
    }
}
