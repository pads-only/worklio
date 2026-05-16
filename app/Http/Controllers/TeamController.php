<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        Gate::authorize('viewAny', Team::class);

        $teams = Auth::user()->teams()->with('users')->latest()->get();

        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        Gate::authorize('create', Team::class);

        $team = Team::create([
            'name' => $request->name,
            'description' => $request->description,
            'owner_id' => Auth::id(),
            'slug' => str()->slug($request->name) . '-' . str()->random(5),
        ]);

        $team->users()->attach($request->user()->id, ['role' => 'owner']);

        return redirect()->route('team');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        Gate::authorize('view', $team);

        // if (! $team) {
        //     redirect()->route('team', strtolower($username));
        // }
        $projects = $team->projects()->latest()->get();

        return view('team.show', compact('team', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        Gate::authorize('update', $team);

        $team->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => str()->slug($request->name) . '-' . str()->random(5),
        ]);

        return redirect()->route('team.show', $team->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Team $team): RedirectResponse
    {
        Gate::authorize('delete', $team);

        $request->validateWithBag('deleteTeam', [
            'name' => ['required', 'string', 'in:' . $team->name],
        ]);

        $team->delete();

        return redirect()->route('team');
    }
}
