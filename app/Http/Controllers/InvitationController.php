<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Requests\UpdateInvitationRequest;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            abort(403);
        }

        $invitations = Auth::user()->invitations()->with('team')->get();

        return view('invitation.index', compact('invitations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $username, Team $team)
    {
        if (!Auth::check() || $team->owner_id !== Auth::id()) {
            abort(403);
        }
        return view('invitation.create', compact('team', 'username'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvitationRequest $request, string $username, Team $team)
    {
        if (!Auth::check() || $team->owner_id !== Auth::id()) {
            abort(403);
        }


        if ($team->users()->where('email', $request->email)->exists() || Invitation::where('email', $request->email)->where('team_id', $team->id)->exists()) {
            return redirect()->route('team.invite.create', [$username, $team->slug])->withErrors(['email' => 'This email is already a member or has already been invited.']);
        }

        Invitation::create([
            'team_id' => $team->id,
            'email' => $request->email,
            'token' => str()->random(32),
            'role' => 'member',
            'expires_at' => now()->addDays(2),
        ]);

        return redirect()->route('team.show', [$username, $team->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function accept(string $username, Team $team, Invitation $invitation)
    {
        // dd("working");
        if (!Auth::check() || $invitation->email !== Auth::user()->email || $team->id !== $invitation->team_id) {
            abort(403);
        }

        $team->users()->attach(Auth::id(), ['role' => 'member']);

        $invitation->delete();

        return redirect()->route('team.show', [$username, $team->slug]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvitationRequest $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
