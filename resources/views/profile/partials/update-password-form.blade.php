<section>

    {{-- HEADER --}}
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-foreground">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-muted-foreground">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    {{-- FORM --}}
    <form method="POST" action="{{ route('password.update') }}" class="space-y-8">

        @csrf
        @method('PUT')

        <div class="space-y-5">

            {{-- CURRENT PASSWORD --}}
            <div>
                <x-input-label for="current_password" value="Current Password" required />
                <x-text-input
                    id="current_password"
                    name="current_password"
                    type="password"
                    class="mt-2 block w-full"
                    autocomplete="current-password"
                />
                <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
            </div>

            {{-- NEW PASSWORD --}}
            <div>
                <x-input-label for="password" value="New Password" required />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full"
                    autocomplete="new-password"
                />
                <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div>
                <x-input-label for="password_confirmation" value="Confirm Password" required />
                <x-text-input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="mt-2 block w-full"
                    autocomplete="new-password"
                />
                <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
            </div>

        </div>

        {{-- ACTIONS --}}
        <div class="flex items-center gap-3">

            <x-primary-button>
                Save Changes
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <span
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-muted-foreground"
                >
                    Saved.
                </span>
            @endif

        </div>

    </form>

</section>