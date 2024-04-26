<?php

namespace Modules\Tasks\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Tasks\App\Http\Requests\TaskCreateRequest;
use Modules\Tasks\App\Http\Requests\TaskUpdateRequest;
use Modules\Tasks\App\Models\Tasks;
use Modules\Tasks\App\Services\Contracts\TaskServiceContract;

class TasksController extends Controller
{
    public function __construct(private readonly TaskServiceContract $taskServiceContract)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskServiceContract->index();
        return view('tasks.index',compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        [$users,$clients,$projects] = $this->taskServiceContract->getData();
        return view('tasks.createTask',compact("users","clients","projects"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $result = $this->taskServiceContract->createTask($data);
        if ($result) {
            return redirect()->back()->with('create_success', 'Task Created Successfuly');
        }
        return redirect()->back()->withErrors('create_fail', 'Task Not Created');
    }

    /**
     * Show the specified resource.
     */
    public function show(Tasks $task)
    {
        return view('tasks.showTask',compact("task"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {
        return view('tasks.updateTask',compact("task"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        $result = $this->taskServiceContract->updateTask($data, $id);
        if ($result) {
            return redirect()->back()->with("update_success", "Task Updated Successfuly");
        }
        return redirect()->back()->with("update_fail", "Task Not Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task)
    {
        $this->taskServiceContract->deleteTask($task->id);
        return redirect()->route('tasks.index')->with("delete_success", "Task Deleted Successfuly");
    }

    public function filter(Request $request)
    {
        $tasks = $this->taskServiceContract->filterTasks($request->input());
        return view("tasks.index", compact("tasks"));
    }
}
