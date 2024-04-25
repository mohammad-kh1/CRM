<?php

namespace Modules\Clients\App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Clients\App\Models\Clients;
use Modules\Clients\App\Repositories\Contracts\ClientEloquentContract;

class ClientsEloquent implements ClientEloquentContract
{
    public function index() : LengthAwarePaginator
    {
        return Clients::select("company_name","vat","address","id")->paginate(10);
    }

    public function createClient(array $data): Model|Clients
    {
        return Clients::create($data);
    }
}
