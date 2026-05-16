<x-app-layout>
    {{-- <div class="min-h-screen bg-gray-50 text-gray-900">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <header class="border-b border-gray-200 pb-6">
                <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                    <p class="text-sm font-medium text-indigo-600">Worklio.io</p>
                    <h1 class="mt-1 text-2xl font-semibold sm:text-3xl">Product Team</h1>
                    <p class="mt-2 max-w-2xl text-sm text-gray-600 sm:text-base">
                        Main product planning, roadmap execution, and cross-functional delivery.
                    </p>

                    <div class="mt-4 flex flex-wrap items-center gap-4 text-sm text-gray-600">
                        <div class="flex -space-x-2">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">JD</div>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">MS</div>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">PR</div>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">AL</div>
                        </div>
                        <span>+8 members</span>
                        <span>3 projects</span>
                    </div>
                    </div>

                    <div class="flex flex-wrap gap-2">
                    <button class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Edit Team</button>
                    <button class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Invite Members</button>
                    <button class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">Create Task</button>
                    </div>
                </div>
            </header>

            <div class="mt-6 grid gap-8 lg:grid-cols-12">
            <main class="lg:col-span-8">
                <section class="border-b border-gray-200 pb-4">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                        <h2 class="text-lg font-medium">Tasks</h2>
                        <p class="text-sm text-gray-600">Priority work for this team.</p>
                        </div>

                        <input
                        type="text"
                        placeholder="Search tasks..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm outline-none focus:border-indigo-500 sm:w-64"
                        />
                    </div>
                </section>

                <section>
                    <div class="border-b border-gray-200 py-5">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h3 class="font-medium">Finalize onboarding flow</h3>
                            <p class="mt-1 text-sm text-gray-600">Improve first-time user activation and handoff experience.</p>
                        </div>
                        <span class="rounded-lg border border-indigo-200 bg-indigo-50 px-3 py-1 text-xs text-indigo-700">In Progress</span>
                        </div>
                        <div class="mt-3 flex flex-wrap gap-4 text-sm text-gray-500">
                        <span>Assigned to Maria Santos</span>
                        <span>Due May 14</span>
                        </div>
                    </div>

                <div class="border-b border-gray-200 py-5">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h3 class="font-medium">Review Q2 roadmap draft</h3>
                            <p class="mt-1 text-sm text-gray-600">Prepare roadmap priorities for next planning session.</p>
                        </div>
                        <span class="rounded-lg border border-gray-300 bg-gray-50 px-3 py-1 text-xs text-gray-700">Todo</span>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-4 text-sm text-gray-500">
                        <span>Assigned to Juan Dela Cruz</span>
                        <span>Due May 17</span>
                    </div>
                </div>

                <div class="border-b border-gray-200 py-5">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h3 class="font-medium">Update analytics dashboard</h3>
                        <p class="mt-1 text-sm text-gray-600">Add team-level metrics for weekly reporting.</p>
                    </div>
                    <span class="rounded-lg border border-gray-300 bg-gray-50 px-3 py-1 text-xs text-gray-700">Todo</span>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-4 text-sm text-gray-500">
                    <span>Assigned to Paolo Reyes</span>
                    <span>Due May 19</span>
                    </div>
                </div>
                </section>
            </main>

            <aside class="lg:col-span-4">
                <section class="border-b border-gray-200 pb-5">
                <h2 class="text-lg font-medium">Quick Actions</h2>
                <div class="mt-4 space-y-2">
                    <button class="block w-full rounded-lg border border-gray-300 px-4 py-2 text-left text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Assign Task</button>
                    <button class="block w-full rounded-lg border border-gray-300 px-4 py-2 text-left text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Leave Team</button>
                </div>
                </section>

                <section class="pt-5">
                <h2 class="text-lg font-medium">Projects</h2>
                <div class="mt-4 space-y-3 text-sm text-gray-700">
                    <div class="border-b border-gray-200 pb-3">Worklio Dashboard Redesign</div>
                    <div class="border-b border-gray-200 pb-3">Task Assignment Flow</div>
                    <div class="border-b border-gray-200 pb-3">Q2 Planning Board</div>
                </div>
                </section>
            </aside>
            </div>
        </div>
    </div> --}}
    <x-modal name="edit-team" :show="$errors->updateTeam->isNotEmpty()" focusable>
        <form method="post" action="{{ route('team.update', $team->slug) }}" class="p-6">
            @csrf
            @method('patch')
            <h2 class="text-lg font-medium text-gray-900">
                Edit Team
            </h2>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Name') }}" />

                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    :value="old('name', $team->name)"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Give your team a name') }}"
                />

                <x-input-error :messages="$errors->updateTeam->get('name')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="description" value="{{ __('Description') }}" class="" />

                <x-text-input id="description" name="description" type="text" :value="old('description', $team->description)" class="mt-1 block w-full" placeholder="{{ __('Describe your team') }}" />

                <x-input-error :messages="$errors->updateTeam->get('description')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Update Team') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

    <x-modal name="confirm-delete-team" :show="$errors->deleteTeam->isNotEmpty()" focusable>
        <form method="post" action="{{ route('team.destroy', $team->slug) }}" class="p-6">
            @csrf
            @method('delete')
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this team?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your team is deleted, all of its resources and data will be permanently deleted. Please enter the team name to confirm you would like to permanently delete your team.') }}
            </p>
            <div class="mt-6">
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    :value="old('name')"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Enter the team name') }}"
                />

                <x-input-error :messages="$errors->deleteTeam->get('name')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Team') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    <div class="min-h-screen bg-gray-50 text-gray-900">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <header class="border-b border-gray-200 pb-6">
                <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                    <div>
                        <h1 class="mt-1 text-2xl font-semibold sm:text-3xl">{{ $team->name }}</h1>
                        <p class="mt-2 max-w-2xl text-sm text-gray-600 sm:text-base">
                            {{ $team->description ?? 'No description provided.' }}
                        </p>

                        <div class="mt-4 flex flex-wrap items-center gap-4 text-sm text-gray-600">
                            <div class="flex -space-x-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">JD</div>
                                <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">MS</div>
                                <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">PR</div>
                                <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">AL</div>
                            </div>
                            <span>+8 members</span>
                            <span>3 active projects</span>
                        </div>
                    </div>
                    @can('update', $team)
                    <div class="flex flex-wrap gap-2">
                        <x-secondary-button x-data="" x-on:click="$dispatch('open-modal', 'edit-team')" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Edit Team</x-secondary-button>
                        <a href="{{ route('team.invite.create', $team->slug) }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Invite Members</a>
                        <a href="{{ route('project.create', $team->slug) }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:border-indigo-500 hover:text-indigo-600">New Project</a>
                    </div>
                    @endcan
                </div>
            </header>

            <div class="mt-6 grid gap-8 lg:grid-cols-12">
            <main class="lg:col-span-8">
                <section class="border-b border-gray-200 pb-4">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                        <h2 class="text-lg font-medium">Projects</h2>
                        <p class="text-sm text-gray-600">Active workspaces owned by this team.</p>
                        </div>

                        <input
                        type="text"
                        placeholder="Search projects..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm outline-none focus:border-indigo-500 sm:w-64"
                        />
                    </div>
                </section>

                <section>
                    @forelse ($projects as $project)
                        <div class="border-b border-gray-200 py-5">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <a href="{{ route('project.show', [$team->slug, $project->slug]) }}" class="text-indigo-600 hover:text-indigo-900">{{ $project->name }}</a>
                                    <p class="mt-1 text-sm text-gray-600">{{ $project->description }}.</p>
                                </div>
                                <span class="rounded-lg border border-indigo-200 bg-indigo-50 px-3 py-1 text-xs text-indigo-700">{{ $project->status }}</span>
                            </div>
                            <div class="mt-3 flex flex-wrap gap-4 text-sm text-gray-500">
                                <span>14 tasks</span>
                                <span>6 completed</span>
                                <span>Due May 18</span>
                            </div>
                            <div class="mt-4">
                                <div class="h-2 overflow-hidden rounded-lg bg-gray-100">
                                    <div class="h-full w-2/5 rounded-lg bg-indigo-600"></div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No projects found for this team.</p>
                    @endforelse
                </section>
            </main>

            <aside class="lg:col-span-4 bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                <section class="border-b border-gray-200 pb-5">
                    <h2 class="text-lg font-medium">Recent Tasks</h2>
                    <div class="mt-4 space-y-4 text-sm text-gray-700">
                        <div class="border-b border-gray-200 pb-3">
                            Finalize onboarding copy
                            <p class="mt-1 text-xs text-gray-500">Worklio Dashboard Redesign</p>
                        </div>
                        <div class="border-b border-gray-200 pb-3">
                            Review task ownership states
                            <p class="mt-1 text-xs text-gray-500">Task Assignment Flow</p>
                        </div>
                        <div class="border-b border-gray-200 pb-3">
                            Update milestone estimates
                            <p class="mt-1 text-xs text-gray-500">Q2 Planning Board</p>
                        </div>
                    </div>
                </section>

                <section class="pt-5 border-b border-gray-200 pb-5">
                    <h2 class="text-lg font-medium">Quick Actions</h2>
                    <div class="mt-4 space-y-2">
                        <button class="block w-full rounded-lg border border-gray-300 px-4 py-2 text-left text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Create Task</button>
                        <button class="block w-full rounded-lg border border-gray-300 px-4 py-2 text-left text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Assign Task</button>
                        <button class="block w-full rounded-lg border border-gray-300 px-4 py-2 text-left text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Leave Team</button>
                    </div>
                </section>
                @can('delete', $team)    
                <section class="pt-5">
                    <h2 class="text-lg font-medium">Delete Team</h2>
                    <p class="mt-1 text-sm text-gray-600">Permanently delete this team and all its data.</p>
                    <x-danger-button x-data="" x-on:click="$dispatch('open-modal','confirm-delete-team')" class="mt-3">
                        Delete Team
                    </x-danger-button>
                </section>
                @endcan
            </aside>
            </div>
        </div>
        </div>
</x-app-layout>