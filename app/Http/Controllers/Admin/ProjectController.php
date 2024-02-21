<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newProjectData = $request->all();

        if (isset($newProjectData['name'])) {
            $newProject = new Project();

            $newProject->name = $newProjectData['name'];
            $newProject->description = $newProjectData['description'];
            $newProject->languages = $newProjectData['languages'];
            $newProject->repo_url = $newProjectData['repo_url'];

            $newProject->save();

            return redirect()->route('admin.projects.show', $newProject->id);
        } else {

            return redirect()->back()->with('error', 'Il campo "name" è obbligatorio.');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $data = $request->all();
        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->languages = $data['languages'];
        $project->repo_url = $data['repo_url'];
        $project->save();

        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}