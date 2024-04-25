<?php

namespace Modules\Users\App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserEloquentContract
{
    public function users() : LengthAwarePaginator;

    public function createUser(array $data) : Model | User ;

    public function updateUser(array $data , int $id) : Model | User;

    public function deleteUser(int $id) : bool;

    public function filterUsers(array $data) : Model | Collection;
}
