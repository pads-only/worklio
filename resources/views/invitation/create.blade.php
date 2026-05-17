<x-app-layout>

    <div class="min-h-screen bg-background">
        <div class="mx-auto max-w-2xl px-4 py-10">

            {{-- HEADER --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-foreground">
                    Invite Member
                </h1>
                <p class="mt-1 text-sm text-muted-foreground">
                    Send an invitation to join this team workspace.
                </p>
            </div>

            {{-- FORM CONTAINER --}}
            <div class="rounded-xl border border-border bg-surface p-6 shadow-soft">

                <form action="{{ route('team.invite.store', $team->slug) }}" method="POST">
                    @csrf

                    {{-- EMAIL --}}
                    <div>
                        <x-input-label for="email" value="Email Address" required />

                        <x-text-input
                            type="email"
                            name="email"
                            id="email"
                            required
                            :value="old('email')"
                            class="mt-2 block w-full"
                            placeholder="name@example.com"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- ACTIONS --}}
                    <div class="mt-8 flex items-center justify-end gap-3">

                        <x-link href="{{ route('team.show', $team->slug) }}">
                            Cancel
                        </x-link>

                        <x-primary-button>
                            Send Invitation
                        </x-primary-button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>