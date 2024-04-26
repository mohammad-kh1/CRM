<?php

namespace Modules\Projects\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Projects\App\Models\Projects;

class ProjectsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Projects::factory()->count(20)->create();
    }
}
