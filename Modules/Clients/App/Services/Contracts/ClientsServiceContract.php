<?php

namespace Modules\Clients\App\Services\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface ClientsServiceContract
{
    public function index() : LengthAwarePaginator;
}
