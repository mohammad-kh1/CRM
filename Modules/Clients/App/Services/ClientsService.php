<?php

namespace Modules\Clients\App\Services;

use Illuminate\Database\Eloquent\Collection;
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

    public function deleteClient(int $id) : bool
    {
        return $this->clientEloquentContract->deleteClient($id);
    }

    public function updateClient(array $data , int $id) : Model | Clients
    {
        return $this->clientEloquentContract->updateClient($data , $id);
    }

    public function filterClients(array $data) : Model | Collection
    {
        return $this->clientEloquentContract->filterClients($data);
    }
}
