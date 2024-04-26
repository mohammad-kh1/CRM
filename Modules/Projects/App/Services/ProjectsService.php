<?php

namespace Modules\Projects\App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Projects\App\Models\Projects;
use Modules\Projects\App\Repositories\Contracts\ProjectsEloquentContract;
use Modules\Projects\App\Services\Contracts\ProjectsServiceContract;

class ProjectsService implements ProjectsServiceContract
{
    public function __construct(private readonly ProjectsEloquentContract $projectsEloquentContract)
    {

    }
    public function index() : LengthAwarePaginator
    {
        return $this->projectsEloquentContract->index();
    }

    public function deleteProject(int $id) : bool
    {
        return $this->projectsEloquentContract->deleteProject($id);
    }

    public function updateProject(array $data , int $id) : Model | Projects
    {
        return $this->projectsEloquentContract->updateProject($data,$id);
    }

    public function createProject(array $data) : Model | Projects
    {
        return $this->projectsEloquentContract->createProject($data);
    }

    public function getByTable(string $table) : Builder
    {
        return $this->projectsEloquentContract->getByTable($table);
    }

    public function filterProjects(array $filter) : Model | Collection
    {
        return $this->projectsEloquentContract->filterProjects($filter);
    }
}
