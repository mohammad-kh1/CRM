<?php

namespace Modules\Users\App\Services\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserServiceContract
{
    public function users() : LengthAwarePaginator;

    public function createUser(array $data) : Model | User;

    public function updateUser(array $data , int $id) : Model | User;

    public function deleteUser(int $id) : bool;
}
