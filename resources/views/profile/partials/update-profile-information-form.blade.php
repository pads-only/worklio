<section>

    {{-- HEADER --}}
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-foreground">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-muted-foreground">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    {{-- EMAIL VERIFICATION FORM --}}
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- MAIN FORM --}}
    <form method="POST" action="{{ route('profile.update', $user->username) }}" class="space-y-8">

        @csrf
        @method('PATCH')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- LEFT: FIELDS --}}
            <div class="space-y-5">

                {{-- FIRST NAME --}}
                <div>
                    <x-input-label for="first_name" value="First Name" required />
                    <x-text-input
                        id="first_name"
                        name="first_name"
                        type="text"
                        class="mt-2 block w-full"
                        :value="old('first_name', $user->first_name)"
                        required
                        autofocus
                        autocomplete="given-name"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                </div>

                {{-- LAST NAME --}}
                <div>
                    <x-input-label for="last_name" value="Last Name" required />
                    <x-text-input
                        id="last_name"
                        name="last_name"
                        type="text"
                        class="mt-2 block w-full"
                        :value="old('last_name', $user->last_name)"
                        required
                        autocomplete="family-name"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                </div>

                {{-- USERNAME --}}
                <div>
                    <x-input-label for="username" value="Username" required />
                    <x-text-input
                        id="username"
                        name="username"
                        type="text"
                        class="mt-2 block w-full"
                        :value="old('username', $user->username)"
                        required
                        autocomplete="username"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('username')" />
                </div>

                {{-- EMAIL --}}
                <div>
                    <x-input-label for="email" value="Email Address" required />
                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        class="mt-2 block w-full"
                        :value="old('email', $user->email)"
                        required
                        autocomplete="email"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    {{-- EMAIL VERIFICATION NOTICE --}}
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-3 rounded-lg border border-border bg-muted p-3 text-sm text-muted-foreground">
                            <p>
                                {{ __('Your email address is unverified.') }}

                                <button
                                    form="send-verification"
                                    class="ml-1 text-primary-600 hover:text-primary-700 underline focus:outline-none"
                                >
                                    {{ __('Resend verification email') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-sm text-success">
                                    {{ __('A new verification link has been sent.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- ACTIONS --}}
                <div class="flex items-center gap-3">

                    <x-primary-button>
                        Save Changes
                    </x-primary-button>

                    @if (session('status') === 'profile-updated')
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

            </div>

            {{-- RIGHT: AVATAR --}}
            <div class="flex flex-col items-center justify-start">

                <div class="rounded-xl border border-border bg-surface p-6 shadow-soft">
                    @if ($user->avatar_url)
                        <img
                            class="h-32 w-32 rounded-full object-cover"
                            src="{{ $user->avatar_url }}"
                            alt="{{ $user->username }} avatar"
                        >
                    @else
                        <div class="h-32 w-32 rounded-full bg-primary-100 flex items-center justify-center text-primary-700 text-3xl font-semibold">
                            {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <p class="mt-4 text-sm text-muted-foreground text-center">
                    Profile avatar
                </p>

            </div>

        </div>

    </form>

</section>