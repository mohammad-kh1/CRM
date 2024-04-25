<?php

namespace Modules\Clients\App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Clients\App\Models\Clients;

interface ClientEloquentContract
{
    public function index(): LengthAwarePaginator;

    public function createClient(array $data): Model|Clients;

    public function deleteClient(int $id) : bool;

    public function updateClient(array $data , int $id) : Model | Clients;

    public function filterClients(array $data) : Model | Collection;

}
