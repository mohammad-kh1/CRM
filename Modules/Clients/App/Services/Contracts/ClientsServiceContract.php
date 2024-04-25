<?php

namespace Modules\Clients\App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Clients\App\Models\Clients;

interface ClientsServiceContract
{
    public function index() : LengthAwarePaginator;

    public function createClient(array $data) : Model | Clients;

    public function deleteClient(int $id) : bool;

    public function updateClient(array $data ,int $id) : Model | Clients;
}
