<?php

namespace Modules\Clients\App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Clients\App\Models\Clients;

interface ClientEloquentContract
{
    public function index(): LengthAwarePaginator;

    public function createClient(array $data): Model|Clients;
}
