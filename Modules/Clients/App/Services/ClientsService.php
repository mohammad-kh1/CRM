<?php

namespace Modules\Clients\App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Clients\App\Models\Clients;
use Modules\Clients\App\Repositories\Contracts\ClientEloquentContract;
use Modules\Clients\App\Services\Contracts\ClientsServiceContract;

;

class ClientsService implements ClientsServiceContract
{
    public function __construct(private readonly ClientEloquentContract $clientEloquentContract)
    {
    }

    public function index(): LengthAwarePaginator
    {
        return $this->clientEloquentContract->index();
    }

    public function createClient(array $data): Model|Clients
    {
        return $this->clientEloquentContract->createClient($data);
    }
}
