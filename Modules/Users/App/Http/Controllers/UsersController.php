<?php

namespace Modules\Users\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Users\App\Http\Requests\UserCreateRequest;
use Modules\Users\App\Http\Requests\UserUpdateRequest;
use Modules\Users\App\Services\Contracts\UserServiceContract;

class UsersController extends Controller
{
    public function __construct(private readonly UserServiceContract $userServiceContract)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch All Users
        $users = $this->userServiceContract->users();
        return view("users.users", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.createUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $result = $this->userServiceContract->createUser($data);
        if ($result) {
            return redirect()->back()->with('create_success', 'User Created Successfuly');
        }
        return redirect()->back()->withErrors('create_fail', 'User Not Created');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.updateUser', compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        $result = $this->userServiceContract->updateUser($data, $id);
        if ($result) {
            return redirect()->back()->with("update_success","User Updated Successfuly");
        }
        return redirect()->back()->with("update_fail","User Not Updated");

    }

    /**
     * Remove the specified resource from storUser $user).
     */
    public function destroy(User $user) : RedirectResponse
    {
        $this->userServiceContract->deleteUser($user->id);
        return redirect()->route('users.index')->with("delete_success" , "User Deleted Successfuly");
    }
}
