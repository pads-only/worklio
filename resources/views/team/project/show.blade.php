<x-app-layout>

    {{-- EDIT PROJECT MODAL --}}
    @include('team.project.partials.update-modal')

    {{-- DELETE PROJECT MODAL --}}
    @include('team.project.partials.delete-modal')

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

                        <x-primary-button x-data="" x-on:click="$dispatch('open-modal', 'edit-project')">
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