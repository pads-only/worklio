<x-modal name="edit-team" :show="$errors->updateTeam->isNotEmpty()" focusable>
    <form method="POST" action="{{ route('team.update', $team->slug) }}" class="p-6">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-foreground">
                Edit Team
            </h2>

            <p class="mt-1 text-sm text-muted-foreground">
                Update your workspace information.
            </p>
        </div>

        <div class="space-y-5">
            <div>
                <x-input-label for="name" value="Team Name" />

                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    :value="old('name', $team->name)"
                    class="mt-2 block w-full border-border bg-background"
                />

                <x-input-error :messages="$errors->updateTeam->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="description" value="Description" />

                <x-text-input
                    id="description"
                    name="description"
                    type="text"
                    :value="old('description', $team->description)"
                    class="mt-2 block w-full border-border bg-background"
                />

                <x-input-error :messages="$errors->updateTeam->get('description')" class="mt-2" />
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-3">
            <x-secondary-button x-on:click="$dispatch('close')">
                Cancel
            </x-secondary-button>

            <x-primary-button>
                Update Team
            </x-primary-button>
        </div>
    </form>
</x-modal>