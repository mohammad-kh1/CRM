<?php

namespace Modules\Tasks\App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Tasks\App\Models\Tasks;

interface TaskServiceContract
{
    public function index() : LengthAwarePaginator;

    public function deleteTask(int $id) : bool;

    public function filter(array $filter) : Model | Collection;

    public function updateTask(array $data , int $id) : Model | Tasks;

    public function getData() : array;

    public function createTask(array $data) : Model | Tasks;
}
