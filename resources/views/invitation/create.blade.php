<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white p-4 rounded-lg shadow-md mt-6">
        <form action="{{ route('team.invite.store', $team->slug) }}" method="POST">
            @csrf
            <h2 class="text-2xl font-semibold">Invite user</h2>
            
            <div class="space-y-2 mb-2">
                <x-input-label for="email">Enter email of the user you wish to invite</x-input-label>
                <x-text-input type="email" name="email" id="email" :value="old('email')" class="w-full"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
                
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('team.show', $team->slug) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                <x-primary-button>
                    Create Project
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>