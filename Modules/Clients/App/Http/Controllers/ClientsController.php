<?php

namespace Modules\Clients\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Clients\App\Http\Requests\ClientCreateRequest;
use Modules\Clients\App\Http\Requests\ClientUpdateRequest;
use Modules\Clients\App\Models\Clients;
use Modules\Clients\App\Services\Contracts\ClientsServiceContract;

class ClientsController extends Controller
{
    public function __construct(private readonly ClientsServiceContract $clientsServiceContract)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = $this->clientsServiceContract->index();
        return view("clients.index" ,compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("clients.createClient");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $result = $this->clientsServiceContract->createClient($data);
        if ($result) {
            return redirect()->back()->with("create_success", "Client Created Successfuly");
        }
        return redirect()->back()->with("create_fail", "Client Not Created");

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clients $client)
    {
        return view('clients.updateClient' , compact("client"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientUpdateRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        $result = $this->clientsServiceContract->updateClient($data , $id);
        if ($result) {
            return redirect()->back()->with("update_success", "Client Updated Successfuly");
        }
        return redirect()->back()->with("update_fail", "Client Not Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clients $client)
    {
        $this->clientsServiceContract->deleteClient($client->id);
        return redirect()->route('clients.index')->with("delete_success", "Client Deleted Successfuly");

    }

    public function filter(Request $request)
    {
        $clients = $this->clientsServiceContract->filterClients($request->input());
        return view("clients.index", compact("clients"));

    }
}
