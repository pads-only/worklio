<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Team $team): View
    {
        Gate::authorize('create', Project::class);

        return view('team.project.create', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request, Team $team)
    {
        Gate::authorize('create', Project::class);

        $project = Project::create([
            'team_id' => $team->id,
            'owner_id' => Auth::id(),
            'name' => $request->name,
            'slug' => str()->slug($request->name) . '-' . str()->random(5),
            'description' => $request->description,
        ]);

        return redirect()->route('team.show', $team->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team, Project $project)
    {
        return view('team.project.show', compact('team', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Team $team, Project $project)
    {
        Gate::authorize('update', $project);

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('project.show', [$team->slug, $project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Team $team, Project $project)
    {
        Gate::authorize('delete', $project);

        $request->validateWithBag('deleteProject', [
            'name' => ['required', 'string', 'in:' . $project->name],
        ]);

        $project->delete();

        return redirect()->route('team.show', $team->slug);
    }
}
