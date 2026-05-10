<x-app-layout>
    <x-modal name="create-team" :show="$errors->isNotEmpty()" focusable>
        <form method="post" action="{{ route('my-teams.store', Auth::user()->username) }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                Create a New Team
            </h2>
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Give your team a name') }}"
                />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Create Team') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
    <div class=" bg-gray-100 text-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <header class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="mt-1 text-3xl font-semibold tracking-tight sm:text-4xl">My Teams</h1>
                <p class="mt-2 max-w-2xl text-sm text-gray-400 sm:text-base">
                Teams you’re part of across projects and workspaces.
                </p>
            </div>

            <div class="flex w-full flex-col gap-3 sm:flex-row md:w-auto">
                <x-primary-button x-data="" x-on:click="$dispatch('open-modal', 'create-team')">Create Team</x-primary-button>
            </div>
            </header>

            <section class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-xl border border-gray-200 p-5 shadow-sm bg-white">
                <p class="text-sm text-gray-700">Teams Joined</p>
                <p class="mt-2 text-2xl font-semibold text-gray-900">4</p>
            </div>
            <div class="rounded-xl border border-gray-200 p-5 shadow-sm bg-white">
                <p class="text-sm text-gray-700">Active Projects</p>
                <p class="mt-2 text-2xl font-semibold text-gray-900">9</p>
            </div>
            <div class="rounded-xl border border-gray-200 p-5 shadow-sm bg-white">
                <p class="text-sm text-gray-700">Pending Invites</p>
                <p class="mt-2 text-2xl font-semibold text-gray-900">2</p>
            </div>
            <div class="rounded-xl border border-gray-200 p-5 shadow-sm bg-white">
                <p class="text-sm text-gray-700">Completed Tasks</p>
                <p class="mt-2 text-2xl font-semibold text-gray-900">38</p>
            </div>
            </section>

            <section class="rounded-xl border border-gray-200 shadow-sm bg-white">
            <div class="border-b border-gray-200 px-5 py-4 sm:px-6">
                <h2 class="text-lg font-medium text-gray-900">Your Teams</h2>
            </div>

            <div class="grid gap-4 p-4 sm:grid-cols-2 xl:grid-cols-3 sm:p-6">
                <div class="rounded-xl border border-gray-200 bg-white p-5 transition hover:border-indigo-500">
                <div class="flex items-start justify-between gap-4">
                    <div>
                    <h3 class="font-semibold text-gray-900">Product Team</h3>
                    <p class="mt-1 text-sm text-gray-800">Main product planning and roadmap execution.</p>
                    </div>
                    <span class="rounded-full border border-indigo-200 bg-indigo-500/10 px-3 py-1 text-xs text-indigo-300">Owner</span>
                </div>
                <div class="my-5 flex items-center justify-between text-sm text-gray-500">
                    <span>8 members</span>
                    <span>3 active projects</span>
                </div>
                <a href="{{ route('register') }}" class="rounded-md border border-indigo-500 bg-transparent px-3.5 py-2.5 text-sm font-semibold text-indigo-500 shadow-xs hover:bg-indigo-500 hover:text-white focus-visible:outline-2 transition-all ease-in-out focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Open Team</a>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
