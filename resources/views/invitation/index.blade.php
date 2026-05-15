<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white p-4 rounded-lg shadow-md mt-6">
        <h2 class="text-2xl font-semibold mb-4">Your Invitations</h2>
        
        @if($invitations->isEmpty())
            <p>You have no pending invitations.</p>
        @else
            <ul class="space-y-4">
                @foreach($invitations as $invitation)
                    <li class="border border-gray-300 rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <p class="font-medium">{{ $invitation->team->name }}</p>
                            <p class="text-sm text-gray-500">Invited by {{ $invitation->team->owner->first_name }}</p>
                        </div>
                        <div class="flex gap-2">
                            <form action="{{ route('team.invite.accept', [Auth::user()->username, $invitation->team->slug, $invitation->token]) }}" method="POST">
                                @csrf
                                <x-primary-button type="submit">Accept</x-primary-button>
                            </form>
                            {{-- <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-danger-button type="submit" class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-500">Decline</x-danger-button>
                            </form> --}}
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>