<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white p-4 rounded-lg shadow-md mt-6">
        <form method="POST" action="{{ route('project.store', $team->slug) }}">
            @csrf
            <h2 class="text-2xl font-semibold">Create Project</h2>

            <!-- Project Name -->
            <div class="space-y-2 mb-2">
                <x-input-label for="name">
                    Project Name
                </x-input-label>

                <x-text-input
                    type="text"
                    name="name"
                    id="name"
                    :value="old('name')"
                    class="w-full"
                    placeholder="e.g. Backend API Revamp"
                />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Project Description -->
            <div class="space-y-2 mb-2">
                <x-input-label for="description">
                    Description (optional)
                </x-input-label>

                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="What is this project about?"
                >{{ old('description') }}</textarea>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('team.show', $team->slug) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                <x-primary-button>
                    Create Project
                </x-primary-button>
            </div>
        </form> 
    </div>
</x-app-layout>