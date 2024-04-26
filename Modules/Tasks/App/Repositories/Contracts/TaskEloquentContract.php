<?php

namespace Modules\Tasks\App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Tasks\App\Models\Tasks;

interface TaskEloquentContract
{
    public function index() : LengthAwarePaginator;

    public function deleteTask(int $id) : bool;

    public function updateTask(array $data , int $id) : Model | Tasks;

    public function getData() : array;

    public function createTask(aray $data) : Model | Tasks;
}
