<?php

namespace Modules\Users\App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Users\App\Repositories\Contracts\UserEloquentContract;

class UserEloquentRepository implements UserEloquentContract
{
    public function users(): LengthAwarePaginator
    {
        return User::paginate(10);
    }

    public function createUser(array $data): Model|User
    {
        return User::create($data);
    }

    public function updateuser(array $data, int $id): Model|User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser(int $id): bool
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }

    public function filterUsers(array $data): Model|Collection
    {
        $filter = User::query();

        switch ($data["filter"]) {
            case "first_name":
                $filter->where("first_name", "=", $data["search"])
                    ->orWhere("first_name", "LIKE", "%" . $data["search"] . "%");
                break;
            case "last_name":
                $filter->where("last_name", "=", $data["search"])
                    ->orWhere("last_name", "LIKE", "%" . $data["search"] . "%");
                break;
            case "email":
                $filter->where("email", "=", $data["search"])
                    ->orWhere("email", "LIKE", "%" . $data["search"] . "%");
                break;
            default:
                $filter->where("email", "=", $data["search"])
                    ->orWhere("email", "LIKE", "%" . $data["search"] . "%");
                break;
        };
        return $filter->get();
    }
}
