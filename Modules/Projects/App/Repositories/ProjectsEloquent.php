<?php

namespace Modules\Projects\App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Modules\Projects\App\Models\Projects;
use Modules\Projects\App\Repositories\Contracts\ProjectsEloquentContract;

class ProjectsEloquent implements ProjectsEloquentContract
{
    public function index() : LengthAwarePaginator
    {
        $projcts = Projects::query();
        $projcts->with("user");
        $projcts->with("client");

        return $projcts->paginate(10);
    }

    public function deleteProject(int $id) : bool
    {
        $projcet = Projects::findOrFail($id);
        return $projcet->delete();
    }

    public function updateProject(array $data , int $id) : Model | Projects
    {
        $project = Projects::findOrFail($id);
        $project->update($data);
        return $project;
    }

    public function createProject(array $data) : Model | Projects
    {
            return Projects::create($data);
    }

    public function getByTable(string $table) : Builder
    {
        return DB::table($table);
    }
    public function filterProjects(array $filter) : Model | Collection
    {
        $projcet = Projects::query();
        if($filter["filter"] == "all")
        {
            return $projcet->get();
        }else
        {
            return $projcet->where("status",$filter["filter"])->get();
        }
    }
}
