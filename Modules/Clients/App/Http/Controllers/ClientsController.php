<?php

namespace Modules\Clients\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Clients\App\Http\Requests\ClientCreateRequest;
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
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('clients::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('clients::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
