<?php

namespace Modules\Projects\App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Projects\App\Models\Projects;

interface ProjectsEloquentContract
{
    public function index() : LengthAwarePaginator;

    public function deleteProject(int $id) : bool;

    public function updateProject(array $data , int $id) : Model | Projects;

    public function createProject(array $data) : Model | Projects;

    public function getByTable(string $table) : Builder;

    public function filterProjects(array $filter) : Model | Collection;
}
