<?php

namespace Modules\Clients\App\Repositories;

use Illuminate\Database\Eloquent\Collection;
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

    public function deleteClient($id) : bool
    {
        $client = Clients::findOrFail($id);
        return $client->delete();
    }

    public function updateClient(array $data , int $id) : Model | Clients
    {
        $client = Clients::findOrFail($id);
        $client->update($data);
        return $client;
    }

    public function filterClients(array $data) : Model | Collection
    {
        $filter = Clients::query();

        switch ($data["filter"]) {
            case "company_name":
                $filter->where("company_name", "=", $data["search"])
                    ->orWhere("company_name", "LIKE", "%" . $data["search"] . "%");
                break;
            case "vat":
                $filter->where("vat", "=", $data["search"])
                    ->orWhere("vat", "LIKE", "%" . $data["search"] . "%");
                break;
            case "address":
                $filter->where("address", "=", $data["search"])
                    ->orWhere("address", "LIKE", "%" . $data["search"] . "%");
                break;
            default:
                $filter->where("company_name", "=", $data["search"])
                    ->orWhere("company_name", "LIKE", "%" . $data["search"] . "%");
                break;
        };
        return $filter->get();
    }
}
