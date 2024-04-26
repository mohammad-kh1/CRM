<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Clients\Database\Seeders\ClientsDatabaseSeeder;
use Modules\Projects\Database\Seeders\ProjectsDatabaseSeeder;
use Modules\Tasks\Database\Seeders\TasksDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()
//            ->count(50)
//            ->create();
        $this->call([
//            ClientsDatabaseSeeder::class,
//        ProjectsDatabaseSeeder::class
        TasksDatabaseSeeder::class
        ]);
    }
}
