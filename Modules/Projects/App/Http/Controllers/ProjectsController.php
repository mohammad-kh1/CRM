<?php

namespace Modules\Projects\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Projects\App\Http\Requests\ProjectCreateRequest;
use Modules\Projects\App\Http\Requests\ProjectUpdateRequest;
use Modules\Projects\App\Models\Projects;
use Modules\Projects\App\Services\Contracts\ProjectsServiceContract;

class ProjectsController extends Controller
{
    public function __construct(private readonly ProjectsServiceContract $projectsServiceContract)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectsServiceContract->index();
        return view('projects.index',compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allUsers = $this->projectsServiceContract->getByTable("users");
        $allClients = $this->projectsServiceContract->getByTable("clients");
        return view('projects.createProject',compact("allUsers","allClients"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $result = $this->projectsServiceContract->createProject($data);
        if ($result) {
            return redirect()->back()->with('create_success', 'Project Created Successfuly');
        }
        return redirect()->back()->withErrors('create_fail', 'Project Not Created');
    }

    /**
     * Show the specified resource.
     */
    public function show(Projects $project)
    {

        return view('projects.showProject',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projects $project)
    {
        return view('projects.updateProject' , compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        $result = $this->projectsServiceContract->updateProject($data,$id);
        if ($result) {
            return redirect()->back()->with("update_success", "Project Updated Successfuly");
        }
        return redirect()->back()->with("update_fail", "Project Not Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projects $project)
    {
        $this->projectsServiceContract->deleteProject($project->id);
        return redirect()->route('projects.index')->with("delete_success", "Project Deleted Successfuly");
    }

    public function filter(Request $request)
    {
        $projects = $this->projectsServiceContract->filterProjects($request->input());
        return view("projects.index", compact("projects"));

    } 
}
