<?php

namespace Modules\Tasks\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Tasks\App\Models\Tasks;

class TasksDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tasks::factory()->count(30)->create();
    }
}
