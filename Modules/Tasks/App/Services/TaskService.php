<?php

namespace Modules\Tasks\App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Tasks\App\Models\Tasks;
use Modules\Tasks\App\Repositories\Contracts\TaskEloquentContract;
use Modules\Tasks\App\Services\Contracts\TaskServiceContract;

class TaskService implements TaskServiceContract
{
    public function __construct(private readonly TaskEloquentContract $taskEloquentContract)
    {

    }

    public function index() : LengthAwarePaginator
    {
        return  $this->taskEloquentContract->index();
    }

    public function deleteTask(int $id) : bool
    {
        return $this->taskEloquentContract->deleteTask($id);
    }

    public function filter(array $filter) : Model | Collection
    {
        return $this->taskEloquentContract->filter($filter);
    }

    public function updateTask(array $data , int $id) : Model | Tasks
    {
        return $this->taskEloquentContract->updateTask($data , $id);
    }

    public function getData() : array
    {
        return $this->taskEloquentContract->getData();
    }

    public function createTask(array $data): Model|Tasks
    {
        return $this->taskEloquentContract->createTask($data);
    }

}
