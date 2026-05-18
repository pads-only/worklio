<x-modal name="create-team" :show="$errors->isNotEmpty()" focusable>
    <form method="POST" action="{{ route('team.store') }}" class="p-6">
        @csrf

        <h2 class="text-xl font-semibold text-foreground">Create Team</h2>
        <p class="mt-1 text-sm text-muted-foreground">
            Create a workspace for collaboration and projects.
        </p>

        <div class="mt-6 space-y-5">
            <div>
                <x-input-label for="name" value="Team Name" required />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    :value="old('name')"
                    required
                    placeholder="Give your team a name"
                    class="mt-2 block w-full border-border bg-background"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="description" value="Description" />
                <x-text-input
                    id="description"
                    name="description"
                    type="text"
                    :value="old('description')"
                    placeholder="Simple description of your team"
                    class="mt-2 block w-full border-border bg-background"
                />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-3">
            <x-secondary-button x-on:click="$dispatch('close')">
                Cancel
            </x-secondary-button>

            <x-primary-button>
                Create Team
            </x-primary-button>
        </div>
    </form>
</x-modal>