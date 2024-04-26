<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;


class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function store(CreateProjectRequest $request)
    {
        $validatedData = $request->validated();
        $project = Project::create($validatedData);

        return response()->json($project, 201);
    }

    public function show(Project $project)
    {
        return response()->json($project);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validatedData = $request->validated();
        $project->update($validatedData);

        return response()->json($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json(null, 204);
    }
}
