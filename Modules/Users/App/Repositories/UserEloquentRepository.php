<?php

namespace Modules\Users\App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
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

    public function updateuser(array $data , int $id) : Model | User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser(int $id) : bool
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
