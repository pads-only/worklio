<section class="space-y-6">
    <x-modal name="confirm-leave-team" :show="$errors->deleteTeam->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('team.destroy', $team->slug) }}" class="p-6" x-data="{ submitting: false }" @submit.prevent="submitting = true; $el.submit()">
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
                <x-input-label for="delete_name" value="Confirm Team Name" class="sr-only" required />

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

                <x-danger-button x-bind:disabled="submitting" class="disabled:opacity-20 disabled:cursor-not-allowed">
                    <span x-show="!submitting">Leave</span>
                    <span x-show="submitting">Leaving...</span>
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>