<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = max((int)$this->command->ask('How many users would you like ?',20),1);

        User::factory()->superAdmin()->create();
        User::factory()->admin()->create();
        User::factory(4)->adminOthers()->create();
        User::factory()->user()->create();

        User::factory($usersCount)->create();

        $this->command->info('Created '.$usersCount.' users + 5 Admin, 1 SuperAdmin');
    }
}
