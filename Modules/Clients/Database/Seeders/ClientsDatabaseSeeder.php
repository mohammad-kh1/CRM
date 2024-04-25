<?php

namespace Modules\Clients\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Clients\App\Models\Clients;

class ClientsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clients::factory()->count(20)->create();
    }
}
