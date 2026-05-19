<x-app-layout>
    <div class="min-h-screen bg-background">
        <div class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- PAGE HEADER --}}
            <section class="rounded-xl border border-border bg-surface p-6 shadow-card">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">

                    <div>
                        <div class="inline-flex items-center gap-2 rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700">
                            <div class="h-2 w-2 rounded-full bg-primary-500"></div>
                            Team Invitations
                        </div>

                        <h1 class="mt-4 text-3xl font-bold tracking-tight text-foreground">
                            Pending Invitations for {{$team->name}}
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-relaxed text-muted-foreground">
                            Manage invitations sent to users for joining your workspace.
                        </p>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        <x-link
                            :active="true"
                            href="{{ route('team.invite.create', $team->slug) }}"
                        >
                            Invite Member
                        </x-link>

                        <x-link
                            href="{{ route('team.show', $team->slug) }}"
                        >
                            Back to Team
                        </x-link>
                    </div>
                </div>
            </section>

            {{-- STATS --}}
            <section class="mt-6 grid gap-4 md:grid-cols-3">

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm font-medium text-muted-foreground">
                        Total Invitations
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-foreground">
                        {{ $invitations->count() }}
                    </h2>
                </div>

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm font-medium text-muted-foreground">
                        Pending
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-warning">
                        {{ $invitations->where('accepted_at', null)->count() }}
                    </h2>
                </div>

                <div class="rounded-xl border border-border bg-surface p-5 shadow-soft">
                    <p class="text-sm font-medium text-muted-foreground">
                        Accepted
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-success">
                        {{ $invitations->whereNotNull('accepted_at')->count() }}
                    </h2>
                </div>
            </section>

            {{-- INVITATION LIST --}}
            <section class="mt-8">

                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-foreground">
                            Invitations
                        </h2>

                        <p class="mt-1 text-sm text-muted-foreground">
                            Users who have been invited to this workspace.
                        </p>
                    </div>
                </div>

                <div class="mt-5 space-y-4">
                    @forelse ($invitations as $invitation)

                        <div class="rounded-xl border border-border bg-surface p-5 shadow-soft transition hover:border-primary-300 hover:shadow-card">

                            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                                {{-- USER INFO --}}
                                <div class="flex items-center gap-4">

                                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary-100 text-sm font-semibold text-primary-700">
                                        {{ strtoupper(substr($invitation->email, 0, 1)) }}
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-semibold text-foreground">
                                            {{ $invitation->email }}
                                        </h3>

                                        <div class="mt-1 flex flex-wrap items-center gap-3 text-xs text-muted-foreground">
                                            <span>
                                                Sent {{ $invitation->created_at->diffForHumans() }}
                                            </span>

                                            <span>
                                                Expires {{ $invitation->expires_at?->diffForHumans() ?? 'Never' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- STATUS + ACTIONS --}}
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

                                    @if ($invitation->accepted_at)
                                        <div class="inline-flex items-center gap-2 rounded-full bg-success-light px-3 py-1 text-xs font-medium text-success-dark">
                                            <div class="h-2 w-2 rounded-full bg-success"></div>
                                            Accepted
                                        </div>
                                    @else
                                        <div class="inline-flex items-center gap-2 rounded-full bg-warning/10 px-3 py-1 text-xs font-medium text-warning">
                                            <div class="h-2 w-2 rounded-full bg-warning"></div>
                                            Pending
                                        </div>
                                    @endif

                                    <div class="flex items-center gap-2">

                                        <form
                                            action="#"
                                            method="POST"
                                        >
                                            @csrf

                                            <x-secondary-button>
                                                Resend
                                            </x-secondary-button>
                                        </form>
                                        <x-danger-button>
                                            Cancel
                                        </x-danger-button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty

                        <div class="rounded-xl border border-dashed border-border bg-surface p-12 text-center">

                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-xl bg-primary-50">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-7 w-7 text-primary-500"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M18 8A6 6 0 006 8m12 0v8a2 2 0 01-2 2H8a2 2 0 01-2-2V8m12 0H6"
                                    />
                                </svg>
                            </div>

                            <h3 class="mt-5 text-lg font-semibold text-foreground">
                                No invitations yet
                            </h3>

                            <p class="mt-2 text-sm text-muted-foreground">
                                Start inviting members to collaborate with your workspace.
                            </p>

                            <div class="mt-6">
                                <x-link
                                    :active="true"
                                    href="{{ route('team.invite.create', $team->slug) }}"
                                >
                                    Invite Member
                                </x-link>
                            </div>
                        </div>

                    @endforelse
                </div>
            </section>
        </div>
    </div>
</x-app-layout>