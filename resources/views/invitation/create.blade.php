<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white p-4 rounded-lg shadow-md mt-6">
        <form action="{{ route('team.invite.store', [$username, $team->slug]) }}" method="POST">
            @csrf
            <h2 class="text-2xl font-semibold">Invite user</h2>
            
            <div class="space-y-2 mb-2">
                <x-input-label for="email">Enter email of the user you wish to invite</x-input-label>
                <x-text-input type="email" name="email" id="email" :value="old('email')" class="w-full"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
                
            <x-primary-button>Invite</x-primary-button>
        </form>
    </div>
</x-app-layout>