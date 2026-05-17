<section class="space-y-6">

    {{-- HEADER --}}
    <header>
        <h2 class="text-lg font-semibold text-foreground">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-muted-foreground">
            {{ __('Permanently delete your account and all associated data. This action cannot be undone.') }}
        </p>
    </header>

    {{-- TRIGGER --}}
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Delete Account') }}
    </x-danger-button>

    {{-- MODAL --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="POST" action="{{ route('profile.destroy', $user->username) }}" class="p-6">

            @csrf
            @method('DELETE')

            <h2 class="text-lg font-semibold text-foreground">
                {{ __('Are you absolutely sure?') }}
            </h2>

            <p class="mt-2 text-sm text-muted-foreground">
                {{ __('This will permanently delete your account and remove all related data. Please enter your password to confirm.') }}
            </p>

            {{-- PASSWORD --}}
            <div class="mt-6">
                <x-input-label for="password" value="Password" class="sr-only" required />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full"
                    requried
                    placeholder="Enter your password"
                />

                <x-input-error
                    class="mt-2"
                    :messages="$errors->userDeletion->get('password')"
                />
            </div>

            {{-- ACTIONS --}}
            <div class="mt-8 flex justify-end gap-3">

                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Yes, delete my account') }}
                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>