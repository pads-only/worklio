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