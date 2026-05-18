<x-app-layout>
    {{-- EDIT TEAM MODAL --}}
    @include('team.partials.edit-modal')

    {{-- DELETE TEAM MODAL --}}
    @include('team.partials.delete-modal')

    {{-- LEAVE TEAM MODAL --}}
    <x-modal name="confirm-leave-team" :show="$errors->deleteTeam->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('team.destroy', $team->slug) }}" class="p-6">
            @csrf
            @method('DELETE')

            <div class="mb-5">
                <h2 class="text-xl font-semibold ">
                    Leave Team
                </h2>

                <p class="mt-2 text-sm leading-relaxed text-muted-foreground">
                    Are you sure you want to leave this team?
                </p>
            </div>

            <div>
                <x-input-label for="delete_name" value="Confirm Team Name" required />

                <x-text-input
                    id="delete_name"
                    name="name"
                    type="text"
                    :value="old('name')"
                    required
                    class="mt-2 block w-full border-border bg-background"
                    placeholder="Enter team name"
                />

                <x-input-error :messages="$errors->deleteTeam->get('name')" class="mt-2" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>

                <x-danger-button>
                    Delete Team
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    <div class="min-h-screen bg-background">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <section class="rounded-xl border border-border bg-surface p-6 shadow-card">
                <div class="flex flex-col gap-6 xl:flex-row xl:items-start xl:justify-between">

                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-3">

                            <div class="inline-flex items-center gap-2 rounded-full bg-success-light px-3 py-1 text-xs font-medium text-success-dark">
                                <div class="h-2 w-2 rounded-full bg-success"></div>
                                Active Workspace
                            </div>

                            <div class="rounded-full bg-accent px-3 py-1 text-xs font-medium text-accent-foreground">
                                {{ $team->users->count() }} Members
                            </div>

                            <div class="rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700">
                                {{ $projects->count() }} Projects
                            </div>
                        </div>

                        <h1 class="mt-5 text-3xl font-bold tracking-tight text-foreground sm:text-4xl">
                            {{ $team->name }}
                        </h1>

                        <p class="mt-3 max-w-3xl text-sm leading-relaxed text-muted-foreground sm:text-base">
                            {{ $team->description ?? 'No workspace description provided yet.' }}
                        </p>

                        {{-- MEMBERS --}}
                        <div class="mt-6 flex flex-wrap items-center gap-4">

                            <div class="flex -space-x-3">
                                @foreach ($team->users->take(5) as $user)
                                    <div class="flex h-11 w-11 items-center justify-center rounded-full border-2 border-white bg-primary-100 text-sm font-semibold text-primary-700 shadow-soft">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endforeach

                                @if ($team->users->count() > 5)
                                    <div class="flex h-11 w-11 items-center justify-center rounded-full border-2 border-white bg-muted text-xs font-semibold text-muted-foreground shadow-soft">
                                        +{{ $team->users->count() - 5 }}
                                    </div>
                                @endif
                            </div>

                            <p class="text-sm text-muted-foreground">
                                Collaborating across projects and tasks.
                            </p>
                        </div>
                    </div>

                    {{-- ACTIONS --}}
                    @can('update', $team)
                        <div class="flex flex-col gap-3 sm:flex-row xl:flex-col">

                            <x-link
                                :active="true"
                                href="{{ route('project.create', $team->slug) }}"
                            >
                                New Project
                            </x-link>

                            <x-link
                                href="{{ route('team.invite.create', $team->slug) }}"
                            >
                                Invite Members
                            </x-li>

                            <x-secondary-button
                                x-data=""
                                x-on:click="$dispatch('open-modal', 'edit-team')"
                            >
                                Edit Team
                            </x-secondary-button>
                            <x-link href="{{ route('team.invite.index', $team->slug) }}">
                                My Invites
                            </x-link>
                        </div>
                    @endcan
                </div>
            </section>

            {{-- STATS --}}
            <section class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm font-medium text-muted-foreground">
                        Total Projects
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-foreground">
                        {{ $projects->count() }}
                    </h2>
                </div>

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm font-medium text-muted-foreground">
                        Team Members
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-foreground">
                        {{ $team->users->count() }}
                    </h2>
                </div>

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm font-medium text-muted-foreground">
                        Active Workspaces
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-foreground">
                        {{ $projects->where('status', 'active')->count() }}
                    </h2>
                </div>

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm font-medium text-muted-foreground">
                        Completion Rate
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-foreground">
                        68%
                    </h2>
                </div>
            </section>

            {{-- CONTENT --}}
            <div class="mt-8 grid gap-8 xl:grid-cols-12">

                {{-- MAIN CONTENT --}}
                <main class="xl:col-span-8">

                    {{-- TOOLBAR --}}
                    <div class="mb-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <h2 class="text-xl font-semibold text-foreground">
                                Projects
                            </h2>

                            <p class="mt-1 text-sm text-muted-foreground">
                                Active workspaces and ongoing initiatives.
                            </p>
                        </div>

                        <div class="flex items-center gap-3">

                            <div class="relative">
                                <input
                                    type="text"
                                    placeholder="Search projects..."
                                    class="w-full rounded-xl border border-border bg-surface py-2.5 pl-10 pr-4 text-sm text-foreground shadow-soft outline-none transition focus:border-primary-400 focus:ring-0 sm:w-72"
                                />

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010 17.5a7.5 7.5 0 006.65-3.85z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- PROJECT LIST --}}
                    <div class="space-y-5">
                        @forelse ($projects as $project)

                            <div class="rounded-xl border border-border bg-surface p-5 shadow-soft transition hover:border-primary-300 hover:shadow-card">

                                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">

                                    <div class="flex-1">
                                        <div class="flex flex-wrap items-center gap-3">

                                            <a
                                                href="{{ route('project.show', [$team->slug, $project->slug]) }}"
                                                class="text-lg font-semibold text-foreground transition hover:text-primary-600"
                                            >
                                                {{ $project->name }}
                                            </a>

                                            <span class="rounded-lg bg-primary-50 px-3 py-1 text-xs font-medium capitalize text-primary-700">
                                                {{ $project->status }}
                                            </span>
                                        </div>

                                        <p class="mt-3 text-sm leading-relaxed text-muted-foreground">
                                            {{ $project->description ?? 'No project description provided.' }}
                                        </p>

                                        <div class="mt-5 flex flex-wrap items-center gap-5 text-sm">

                                            <div>
                                                <p class="text-muted-foreground">
                                                    Tasks
                                                </p>

                                                <p class="mt-1 font-semibold text-foreground">
                                                    14
                                                </p>
                                            </div>

                                            <div>
                                                <p class="text-muted-foreground">
                                                    Completed
                                                </p>

                                                <p class="mt-1 font-semibold text-foreground">
                                                    8
                                                </p>
                                            </div>

                                            <div>
                                                <p class="text-muted-foreground">
                                                    Due Date
                                                </p>

                                                <p class="mt-1 font-semibold text-foreground">
                                                    May 18
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- PROGRESS --}}
                                    <div class="w-full lg:max-w-[220px]">
                                        <div class="flex items-center justify-between text-sm">
                                            <span class="text-muted-foreground">
                                                Progress
                                            </span>

                                            <span class="font-medium text-foreground">
                                                65%
                                            </span>
                                        </div>

                                        <div class="mt-3 h-2 overflow-hidden rounded-full bg-muted">
                                            <div class="h-full w-[65%] rounded-full bg-primary-500"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="rounded-xl border border-dashed border-border bg-surface p-12 text-center">

                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-xl bg-primary-50">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-7 w-7 text-primary-500"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2"
                                        />
                                    </svg>
                                </div>

                                <h3 class="mt-5 text-lg font-semibold text-foreground">
                                    No projects yet
                                </h3>

                                <p class="mt-2 text-sm text-muted-foreground">
                                    Start your first workspace project and collaborate with your team.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </main>

                {{-- SIDEBAR --}}
                <aside class="space-y-5 xl:col-span-4">

                    {{-- RECENT ACTIVITY --}}
                    <section class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                        <h2 class="text-lg font-semibold text-foreground">
                            Recent Activity
                        </h2>

                        <div class="mt-5 space-y-5">

                            <div class="flex gap-3">
                                <div class="mt-1 h-2.5 w-2.5 rounded-full bg-primary-500"></div>

                                <div>
                                    <p class="text-sm font-medium text-foreground">
                                        Finalized onboarding copy
                                    </p>

                                    <p class="mt-1 text-xs text-muted-foreground">
                                        Worklio Dashboard Redesign
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <div class="mt-1 h-2.5 w-2.5 rounded-full bg-warning"></div>

                                <div>
                                    <p class="text-sm font-medium text-foreground">
                                        Reviewed task ownership states
                                    </p>

                                    <p class="mt-1 text-xs text-muted-foreground">
                                        Task Assignment Flow
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <div class="mt-1 h-2.5 w-2.5 rounded-full bg-success"></div>

                                <div>
                                    <p class="text-sm font-medium text-foreground">
                                        Updated milestone estimates
                                    </p>

                                    <p class="mt-1 text-xs text-muted-foreground">
                                        Q2 Planning Board
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- TEAM MEMBERS --}}
                    <section class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-foreground">
                                Team Members
                            </h2>

                            <span class="text-sm text-muted-foreground">
                                {{ $team->users->count() }}
                            </span>
                        </div>

                        <div class="mt-5 space-y-4">

                            @foreach ($team->users->take(5) as $user)
                                <div class="flex items-center justify-between">

                                    <div class="flex items-center gap-3">
                                        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-primary-100 text-sm font-semibold text-primary-700">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="text-sm font-medium text-foreground">
                                                {{ $user->name }}
                                            </p>

                                            <p class="text-xs text-muted-foreground">
                                                Team Member
                                            </p>
                                        </div>
                                    </div>

                                    <div class="h-2.5 w-2.5 rounded-full bg-success"></div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    {{-- QUICK ACTIONS --}}
                    <section class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                        <h2 class="text-lg font-semibold text-foreground">
                            Quick Actions
                        </h2>

                        <div class="mt-5 space-y-3">

                            <x-link
                                href="{{ route('project.create', $team->slug) }}"
                                class="w-full"
                            >
                                Create Project
                                <span>→</span>
                            </x-link>

                            <x-link
                                href="{{ route('team.invite.create', $team->slug) }}"
                                class="w-full"
                            >
                                Invite Member
                                <span>→</span>
                            </x-link>

                            <x-danger-button
                                class="w-full bg-transparent text-red-500 border border-red-500 hover:text-muted"
                                {{-- x-data="" --}}
                                {{-- x-on:click="$dispatch('open-modal', 'confirm-leave-team')" --}}
                            >
                                Leave Workspace
                                <span>→</span>
                            </x-danger-button>
                        </div>
                    </section>

                    {{-- DANGER ZONE --}}
                    @can('delete', $team)
                        <section class="rounded-xl border border-destructive/20 bg-destructive-light p-5">
                            <h2 class="text-lg font-semibold text-destructive-dark">
                                Danger Zone
                            </h2>

                            <p class="mt-2 text-sm text-destructive-dark/80">
                                Permanently remove this workspace and all associated data.
                            </p>

                            <x-danger-button
                                x-data=""
                                x-on:click="$dispatch('open-modal', 'confirm-delete-team')"
                                class="mt-5"
                            >
                                Delete Team
                            </x-danger-button>
                        </section>
                    @endcan
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>