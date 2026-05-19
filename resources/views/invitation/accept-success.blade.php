<x-app-layout>
    <section class="max-w-3xl mx-auto mt-5 overflow-hidden rounded-xl bg-surface shadow-card">
                {{-- LEFT CONTENT --}}
        <div class="py-8">

            <div class="flex justify-center items-center flex-col text-center">
                <div class="inline-flex w-fit items-center gap-2 rounded-full bg-success-light px-3 py-1 text-xs font-medium text-success-dark">
                    <div class="h-2 w-2 rounded-full bg-success"></div>
                    Team Invitation Accepted
                </div>
                <h1 class="mt-6 text-3xl font-bold tracking-tight text-foreground sm:text-5xl">
                    Welcome to
                    <span class="text-primary-600">
                        {{ $team->name }}
                    </span>
                </h1>
                <p class="mt-5 max-w-xl text-sm leading-relaxed text-muted-foreground sm:text-base">
                    You are now officially part of the workspace. Collaborate with your team, manage projects, track tasks, and contribute to ongoing work.
                </p>
            </div>

            {{-- ACTIONS --}}
            <div class="mt-10 w-full flex justify-center items-center">
                <x-link
                    :active="true"
                    href="{{ route('team.show', $team->slug) }}"
                >
                    Open Workspace
                </x-link>
            </div>
        </div>
    </section>
</x-app-layout>