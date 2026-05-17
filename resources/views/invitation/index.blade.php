<x-app-layout>

    <div class="min-h-screen bg-background">
        <div class="mx-auto max-w-3xl px-4 py-10">

            {{-- HEADER --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-foreground">
                    Team Invitations
                </h1>
                <p class="mt-1 text-sm text-muted-foreground">
                    Accept or decline invitations to join teams.
                </p>
            </div>

            {{-- EMPTY STATE --}}
            @if($invitations->isEmpty())

                <div class="rounded-xl border border-dashed border-border bg-surface p-10 text-center shadow-soft">
                    <h3 class="text-lg font-semibold text-foreground">
                        No invitations
                    </h3>
                    <p class="mt-2 text-sm text-muted-foreground">
                        You don’t have any pending team invites right now.
                    </p>
                </div>

            @else

                {{-- LIST --}}
                <div class="divide-y divide-border rounded-xl border border-border bg-surface shadow-soft">

                    @foreach($invitations as $invitation)

                        <div class="flex items-center justify-between gap-4 p-5 hover:bg-muted/40 transition">

                            {{-- LEFT --}}
                            <div class="min-w-0">
                                <p class="text-base font-semibold text-foreground">
                                    {{ $invitation->team->name }}
                                </p>

                                <p class="mt-1 text-sm text-muted-foreground">
                                    Invited by {{ $invitation->team->owner->first_name }}
                                </p>
                            </div>

                            {{-- RIGHT ACTIONS --}}
                            <div class="flex items-center gap-2">

                                <form action="{{ route('team.invite.accept', [$invitation->team->slug, $invitation->token]) }}" method="POST">
                                    @csrf
                                    <x-primary-button>
                                        Accept
                                    </x-primary-button>
                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>
    </div>

</x-app-layout>