<?php

namespace Modules\Users\App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Modules\Users\App\Repositories\Contracts\UserEloquentContract;
use Modules\Users\App\Services\Contracts\UserServiceContract;

class UserService implements UserServiceContract
{
    public function __construct(private readonly UserEloquentContract $userEloquentContract)
    {
    }

    public function users(): LengthAwarePaginator
    {
        //Fetch All Users
        return $this->userEloquentContract->users();
    }

    public function createUser(array $data): Model|User
    {
        $data["password"] = Hash::make($data["password"]);
        return $this->userEloquentContract->createUser($data);
    }

    public function updateUser(array $data, int $id): Model|User
    {
        if (empty($data["password"])) {
            unset($data["password"]);
            unset($data["confirm_password"]);
        } else {
            $data["password"] = Hash::make($data["password"]);
        }
        return $this->userEloquentContract->updateUser($data, $id);
    }

    public function deleteUser(int $id) : bool
    {
        return $this->userEloquentContract->deleteUser($id);
    }
}
