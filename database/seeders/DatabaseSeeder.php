<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Modules\Clients\Database\Seeders\ClientsDatabaseSeeder;
use Modules\Projects\Database\Seeders\ProjectsDatabaseSeeder;
use Modules\Tasks\Database\Seeders\TasksDatabaseSeeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            $role1 = Role::create(["name"=>"admin"]);
            $role2 = Role::create(["name"=>"manager"]);

            $user1 = User::create([
                "first_name" => "ADMIN",
                "last_name" => " ",
                "email" => "admin@admin.com",
                "password" => Hash::make("1234"),
            ]);
            $user1->assignRole("admin");

            $createUserPermission = Permission::create(["name"=>"create_user"]);
            $editUserPermission = Permission::create(["name"=>"edit_user"]);
            $deleteUserPermission = Permission::create(["name"=>"delete_user"]);
            $readUserPermission = Permission::create(["name"=>"read_users"]);

            $role2->givePermissionTo($createUserPermission);
            $role2->givePermissionTo($editUserPermission);
            $role2->givePermissionTo($deleteUserPermission);
            $role2->givePermissionTo($readUserPermission);

            $user2 = User::create([
                "first_name" => "manager",
                "last_name" => " ",
                "email" => "manager@admin.com",
                "password" => Hash::make("1234"),
            ]);
            $user2->assignRole("manager");

            $this->call([
                UserSeeder::class,
                ClientsDatabaseSeeder::class,
                ProjectsDatabaseSeeder::class,
                TasksDatabaseSeeder::class,
            ]);


    }
}
