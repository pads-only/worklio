<x-app-layout>

    <div class="min-h-screen bg-background">
        <div class="mx-auto max-w-2xl px-4 py-10">

            {{-- HEADER --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-foreground">
                    Create Project
                </h1>
                <p class="mt-1 text-sm text-muted-foreground">
                    Define a new workspace for tasks, collaboration, and progress tracking.
                </p>
            </div>

            {{-- FORM CONTAINER --}}
            <div class="rounded-xl border border-border bg-surface p-6 shadow-soft">

                <form method="POST" action="{{ route('project.store', $team->slug) }}">
                    @csrf

                    {{-- PROJECT NAME --}}
                    <div>
                        <x-input-label for="name" value="Project Name" required />

                        <x-text-input
                            type="text"
                            name="name"
                            id="name"
                            :value="old('name')"
                            required
                            class="mt-2 "
                            placeholder="e.g. Backend API Revamp"
                        />

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- PROJECT DESCRIPTION --}}
                    <div class="mt-6">
                        <x-input-label for="description" value="Description (optional)" />

                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            class="mt-2 block w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground shadow-soft focus:border-primary-500 focus:ring-primary-500"
                            placeholder="What is this project about?"
                        >{{ old('description') }}</textarea>

                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    {{-- ACTIONS --}}
                    <div class="mt-8 flex items-center justify-end gap-3">

                        <x-link href="{{ route('team.show', $team->slug) }}">
                            Cancel
                        </x-link>

                        <x-primary-button>
                            Create Project
                        </x-primary-button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>