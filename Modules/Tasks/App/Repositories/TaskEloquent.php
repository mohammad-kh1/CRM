<?php

namespace Modules\Tasks\App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Clients\App\Models\Clients;
use Modules\Projects\App\Models\Projects;
use Modules\Tasks\App\Models\Tasks;
use Modules\Tasks\App\Repositories\Contracts\aray;
use Modules\Tasks\App\Repositories\Contracts\TaskEloquentContract;

class TaskEloquent implements TaskEloquentContract
{
    public function index(): LengthAwarePaginator
    {
        $tasks = Tasks::query();
        $tasks->with("user");
        $tasks->with("client");
        $tasks->with("project");

        return $tasks->paginate(10);
    }

    public function deleteTask(int $id): bool
    {
        $task = Tasks::findOrFail($id);
        return $task->delete();
    }

    public function filter(array $filter): Model|Collection
    {
        if ($filter["filter"] == "all") {
            return Tasks::query()->get();
        } else {
            return Tasks::query()->where("status", $filter["filter"]);
        }
    }

    public function updateTask(array $data , int $id) : Model | Tasks
    {
        $task = Tasks::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function getData() : array
    {
        return [User::query(),Clients::query(),Projects::query()];
    }

    public function createTask(aray $data): Model|Tasks
    {
        return Tasks::create($data);
    }
}
