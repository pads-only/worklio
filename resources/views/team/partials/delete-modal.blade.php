<x-modal name="confirm-delete-team" :show="$errors->deleteTeam->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('team.destroy', $team->slug) }}" class="p-6">
            @csrf
            @method('DELETE')

            <div class="mb-5">
                <h2 class="text-xl font-semibold ">
                    Delete Team
                </h2>

                <p class="mt-2 text-sm leading-relaxed text-muted-foreground">
                    This action cannot be undone. All projects, tasks, and workspace data associated with this team will be permanently deleted. Type <span class="text-foreground font-semibold">"{{$team->name}}"</span> to confirm deletion.
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