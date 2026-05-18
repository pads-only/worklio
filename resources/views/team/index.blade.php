<x-app-layout>

    {{-- CREATE TEAM MODAL --}}
    @include('team.partials.create-modal')
    
    <div class="min-h-screen bg-background">
        <div class="mx-auto max-w-7xl px-4 py-8 lg:px-8">

            {{-- HEADER --}}
            <section class="rounded-xl border border-border bg-surface p-6 shadow-card">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                    <div>
                        <div class="inline-flex items-center gap-2 rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700">
                            Workspace Overview
                        </div>

                        <h1 class="mt-4 text-3xl font-bold text-foreground">
                            My Teams
                        </h1>

                        <p class="mt-2 text-sm text-muted-foreground">
                            Manage your workspaces, collaborate with members, and access projects.
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">

                        <x-link href="{{ route('team.invite.invitation') }}">
                            Invitations
                        </x-link>

                        <x-primary-button x-data="" x-on:click="$dispatch('open-modal', 'create-team')">
                            Create Team
                        </x-primary-button>

                    </div>
                </div>
            </section>

            {{-- STATS --}}
            <section class="mt-6 grid gap-4 md:grid-cols-3">

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm text-muted-foreground">Total Teams</p>
                    <p class="mt-2 text-3xl font-bold text-foreground">
                        {{ $teams->count() }}
                    </p>
                </div>

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm text-muted-foreground">Total Projects</p>
                    <p class="mt-2 text-3xl font-bold text-foreground">
                        {{ $teams->sum(fn ($team) => $team->projects->count()) }}
                    </p>
                </div>

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm text-muted-foreground">Total Members</p>
                    <p class="mt-2 text-3xl font-bold text-foreground">
                        {{ $teams->sum(fn ($team) => $team->users->count()) }}
                    </p>
                </div>

            </section>

            {{-- CONTENT --}}
            <div class="mt-8 grid gap-8 xl:grid-cols-12">

                {{-- MAIN GRID --}}
                <main class="xl:col-span-8">

                    {{-- TOOLBAR --}}
                    <div class="mb-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <h2 class="text-xl font-semibold text-foreground">Workspaces</h2>
                            <p class="text-sm text-muted-foreground">Your active teams and collaborations</p>
                        </div>

                        <input
                            type="text"
                            placeholder="Search teams..."
                            class="w-full rounded-xl border border-border bg-surface px-4 py-2 text-sm sm:w-72"
                        />
                    </div>

                    {{-- TEAM GRID --}}
                    <div class="grid gap-5 sm:grid-cols-2">

                        @forelse ($teams as $team)

                            <div class="rounded-xl border border-border bg-surface p-5 shadow-soft transition hover:border-primary-200 hover:shadow-card">

                                <div class="flex items-start justify-between gap-3">

                                    <div>
                                        <a
                                            href="{{ route('team.show', $team->slug) }}"
                                            class="text-lg font-semibold text-foreground hover:text-primary-600"
                                        >
                                            {{ $team->name }}
                                        </a>

                                        <p class="mt-2 text-sm text-muted-foreground line-clamp-2">
                                            {{ $team->description ?? 'No description provided.' }}
                                        </p>
                                    </div>

                                    <span class="rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700">
                                        {{ $team->pivot->role }}
                                    </span>

                                </div>

                                {{-- META --}}
                                <div class="mt-5 flex items-center justify-between text-sm">

                                    <div class="text-muted-foreground">
                                        {{ $team->users->count() }} members
                                    </div>

                                    <div class="text-muted-foreground">
                                        {{ $team->projects->count() }} projects
                                    </div>

                                </div>

                                {{-- FOOTER --}}
                                <div class="mt-5 flex items-center justify-between border-t border-border pt-4">

                                    <div class="flex -space-x-2">
                                        @foreach ($team->users->take(3) as $user)
                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-primary-100 text-xs font-semibold text-primary-700 border-2 border-white">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        @endforeach
                                    </div>

                                    <x-link :active="true" href="{{route('team.show', $team->slug)}}">
                                        Open
                                    </x-link>

                                </div>

                            </div>

                        @empty

                            <div class="col-span-full rounded-xl border border-dashed border-border bg-surface p-12 text-center">
                                <h3 class="text-lg font-semibold text-foreground">No teams yet</h3>
                                <p class="mt-2 text-sm text-muted-foreground">
                                    Create your first workspace to start collaborating.
                                </p>

                                <x-primary-button
                                    class="mt-5"
                                    x-data=""
                                    x-on:click="$dispatch('open-modal', 'create-team')"
                                >
                                    Create Team
                                </x-primary-button>
                            </div>

                        @endforelse

                    </div>

                </main>

                {{-- SIDEBAR --}}
                <aside class="space-y-5 xl:col-span-4">

                    <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                        <h3 class="text-lg font-semibold text-foreground">Quick Insight</h3>

                        <div class="mt-4 space-y-3 text-sm text-muted-foreground">
                            <p>• Teams are your main workspaces</p>
                            <p>• Each team can contain multiple projects</p>
                            <p>• Members share access across projects</p>
                        </div>
                    </div>

                    <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                        <h3 class="text-lg font-semibold text-foreground">Activity</h3>
                        <p class="mt-3 text-sm text-muted-foreground">
                            Recent workspace activity will appear here.
                        </p>
                    </div>

                </aside>

            </div>
        </div>
    </div>

</x-app-layout>