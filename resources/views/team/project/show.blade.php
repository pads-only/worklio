<x-app-layout>

    {{-- EDIT PROJECT MODAL --}}
    <x-modal name="edit-project" :show="$errors->updateProject->isNotEmpty()" focusable>

        <form method="POST" action="{{ route('project.update', [$team->slug, $project->slug]) }}" class="p-6">

            @csrf
            @method('PATCH')

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-foreground">
                    Edit Project
                </h2>

                <p class="mt-1 text-sm text-muted-foreground">
                    Update project details and status.
                </p>
            </div>

            <div class="space-y-5">

                <div>
                    <x-input-label for="name" value="Project Name" required />

                    <x-text-input
                        id="name"
                        name="name"
                        type="text"
                        :value="old('name', $project->name)"
                        class="mt-2 block w-full border-border bg-background"
                    />

                    <x-input-error :messages="$errors->updateProject->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" value="Description" />

                    <x-text-input
                        id="description"
                        name="description"
                        type="text"
                        :value="old('description', $project->description)"
                        class="mt-2 block w-full border-border bg-background"
                    />

                    <x-input-error :messages="$errors->updateProject->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="status" value="Status" />

                    <select
                        id="status"
                        name="status"
                        class="mt-2 block w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground"
                    >
                        <option value="pending" @selected(old('status', $project->status) === 'pending')>Pending</option>
                        <option value="in progress" @selected(old('status', $project->status) === 'in progress')>In Progress</option>
                        <option value="completed" @selected(old('status', $project->status) === 'completed')>Completed</option>
                    </select>

                    <x-input-error :messages="$errors->updateProject->get('status')" class="mt-2" />
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>

                <x-primary-button>
                    Update Project
                </x-primary-button>
            </div>

        </form>
    </x-modal>

    {{-- DELETE PROJECT MODAL --}}
    <x-modal name="confirm-delete-project" :show="$errors->deleteProject->isNotEmpty()" focusable>

        <form method="POST" action="{{ route('project.destroy', [$team->slug, $project->slug]) }}" class="p-6">

            @csrf
            @method('DELETE')

            <div class="mb-5">
                <h2 class="text-xl font-semibold text-foreground">
                    Delete Project
                </h2>

                <p class="mt-2 text-sm text-muted-foreground leading-relaxed">
                    This action cannot be undone. All tasks and project data will be permanently removed.
                </p>
            </div>

            <div>
                <x-input-label for="name" value="Confirm Project Name" required />

                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    required
                    class="mt-2 block w-full border-border bg-background"
                    placeholder="Enter project name"
                />

                <x-input-error :messages="$errors->deleteProject->get('name')" class="mt-2" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>

                <x-danger-button>
                    Delete Project
                </x-danger-button>
            </div>

        </form>

    </x-modal>

    {{-- PAGE WRAPPER --}}
    <div class="min-h-screen bg-background">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <section class="rounded-xl border border-border bg-surface p-6 shadow-card">

                <div class="flex flex-col gap-6 xl:flex-row xl:items-start xl:justify-between">

                    {{-- LEFT --}}
                    <div class="flex-1">

                        <div class="flex flex-wrap items-center gap-3">

                            <span class="rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700 capitalize">
                                {{ $project->status }}
                            </span>

                            <span class="rounded-full bg-muted px-3 py-1 text-xs font-medium text-muted-foreground">
                                {{ $team->name }}
                            </span>

                        </div>

                        <h1 class="mt-5 text-3xl font-bold text-foreground">
                            {{ $project->name }}
                        </h1>

                        <p class="mt-3 max-w-3xl text-sm text-muted-foreground">
                            {{ $project->description ?? 'No project description provided.' }}
                        </p>

                        {{-- META --}}
                        <div class="mt-6 flex flex-wrap items-center gap-4 text-sm text-muted-foreground">

                            <span>24 Tasks</span>
                            <span>8 Completed</span>
                            <span>Due May 18</span>

                        </div>

                    </div>

                    {{-- ACTIONS --}}
                    @can('update', $project)
                    <div class="flex flex-col gap-3 sm:flex-row xl:flex-col">

                        <x-primary-button x-on:click="$dispatch('open-modal', 'edit-project')">
                            Edit Project
                        </x-primary-button>

                        <x-link href="#">
                            Create Task
                        </x-link>

                        <x-secondary-button>
                            Invite Members
                        </x-secondary-button>

                    </div>
                    @endcan

                </div>

            </section>

            {{-- CONTENT --}}
            <div class="mt-8 grid gap-8 xl:grid-cols-12">

                {{-- MAIN --}}
                <main class="xl:col-span-8">

                    {{-- KANBAN BOARD --}}
<section class="xl:col-span-8">

    {{-- HEADER --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h2 class="text-xl font-semibold text-foreground">
                Tasks
            </h2>

            <p class="mt-1 text-sm text-muted-foreground">
                Overview of recent project tasks.
            </p>
        </div>

        <x-link href="#">
            View All Tasks
        </x-link>

    </div>

    {{-- BOARD --}}
    <div class="grid gap-5 lg:grid-cols-3">

        {{-- TODO --}}
        <div class="rounded-xl border border-border bg-surface p-4 shadow-soft">

            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-sm font-semibold text-foreground">Todo</h3>
                <span class="text-xs text-muted-foreground">
                    {{-- {{ $tasksTodo->count() }} --}}
                    10
                </span>
            </div>

            <div class="space-y-3">

                {{-- @forelse ($tasksTodo->take(3) as $task) --}}

                    <div class="rounded-lg border border-border bg-background p-3">

                        <p class="text-sm font-medium text-foreground">
                            {{-- {{ $task->title }} --}}
                            title
                        </p>

                        <p class="mt-1 text-xs text-muted-foreground line-clamp-2">
                            {{-- {{ $task->description }} --}}
                            description
                        </p>

                        <div class="mt-3 flex items-center justify-between">

                            <span class="text-xs text-muted-foreground">
                                {{-- {{ $task->due_date?->format('M d') }} --}}
                                May 20, 2025
                            </span>

                            <x-link href="#">
                                View
                            </x-link>

                        </div>

                    </div>

                {{-- @empty
                    <p class="text-xs text-muted-foreground">
                        No tasks
                    </p>
                @endforelse --}}

            </div>

        </div>

        {{-- IN PROGRESS --}}
        {{-- <div class="rounded-xl border border-border bg-surface p-4 shadow-soft">

            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-sm font-semibold text-foreground">In Progress</h3>
                <span class="text-xs text-muted-foreground">
                    {{ $tasksInProgress->count() }}
                </span>
            </div>

            <div class="space-y-3">

                @forelse ($tasksInProgress->take(3) as $task)

                    <div class="rounded-lg border border-border bg-background p-3">

                        <p class="text-sm font-medium text-foreground">
                            {{ $task->title }}
                        </p>

                        <p class="mt-1 text-xs text-muted-foreground line-clamp-2">
                            {{ $task->description }}
                        </p>

                        <div class="mt-3 flex items-center justify-between">

                            <span class="text-xs text-muted-foreground">
                                {{ $task->due_date?->format('M d') }}
                            </span>

                            <x-link href="{{ route('task.show', [$team->slug, $project->slug, $task->slug]) }}">
                                View
                            </x-link>

                        </div>

                    </div>

                @empty
                    <p class="text-xs text-muted-foreground">
                        No tasks
                    </p>
                @endforelse

            </div>

        </div> --}}

        {{-- COMPLETED --}}
        {{-- <div class="rounded-xl border border-border bg-surface p-4 shadow-soft">

            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-sm font-semibold text-foreground">Completed</h3>
                <span class="text-xs text-muted-foreground">
                    {{ $tasksCompleted->count() }}
                </span>
            </div>

            <div class="space-y-3">

                @forelse ($tasksCompleted->take(3) as $task)

                    <div class="rounded-lg border border-border bg-background p-3 opacity-80">

                        <p class="text-sm font-medium text-foreground line-through">
                            {{ $task->title }}
                        </p>

                        <p class="mt-1 text-xs text-muted-foreground line-clamp-2">
                            {{ $task->description }}
                        </p>

                        <div class="mt-3 flex items-center justify-between">

                            <span class="text-xs text-success">
                                Done
                            </span>

                            <x-link >
                                View
                            </x-link>

                        </div>

                    </div>

                @empty
                    <p class="text-xs text-muted-foreground">
                        No tasks
                    </p>
                @endforelse

            </div>

        </div> --}}

    </div>

</section>
                </main>

                {{-- SIDEBAR --}}
                <aside class="space-y-5 xl:col-span-4">

                    {{-- OVERVIEW --}}
                    <section class="rounded-xl border border-border bg-surface p-5 shadow-soft">

                        <h2 class="text-lg font-semibold text-foreground">
                            Overview
                        </h2>

                        <div class="mt-4 space-y-3 text-sm text-muted-foreground">

                            <div class="flex justify-between">
                                <span>Todo</span>
                                <span>9</span>
                            </div>

                            <div class="flex justify-between">
                                <span>In Progress</span>
                                <span>11</span>
                            </div>

                            <div class="flex justify-between">
                                <span>Completed</span>
                                <span>28</span>
                            </div>

                        </div>

                    </section>

                    {{-- QUICK ACTIONS --}}
                    <section class="rounded-xl border border-border bg-surface p-5 shadow-soft">

                        <h2 class="text-lg font-semibold text-foreground">
                            Quick Actions
                        </h2>

                        <div class="mt-4 space-y-3">

                            <x-link>Create Task</x-link>
                            <x-link>Assign Task</x-link>
                            <x-link>Leave Project</x-link>

                        </div>

                    </section>

                    {{-- DANGER --}}
                    @can('delete', $project)
                    <section class="rounded-xl border border-destructive/20 bg-destructive-light p-5">

                        <h2 class="text-lg font-semibold text-destructive-dark">
                            Danger Zone
                        </h2>

                        <p class="mt-2 text-sm text-destructive-dark/80">
                            This action permanently deletes the project.
                        </p>

                        <x-danger-button
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'confirm-delete-project')"
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