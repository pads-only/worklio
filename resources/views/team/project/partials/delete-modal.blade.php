<section class="space-y-6">
    <x-modal name="confirm-delete-project" :show="$errors->deleteProject->isNotEmpty()" focusable>
    
        <form method="POST" action="{{ route('project.destroy', [$team->slug, $project->slug]) }}" class="p-6" x-data="{ submitting: false }" @submit.prevent="submitting = true; $el.submit()">
    
            @csrf
            @method('DELETE')
    
            <div class="mb-5">
                <h2 class="text-xl font-semibold text-foreground">
                    Delete Project
                </h2>
    
                <p class="mt-2 text-sm text-muted-foreground leading-relaxed">
                    This action cannot be undone. All tasks and project data will be permanently removed. Type <span class="text-foreground font-semibold">"{{$project->name}}"</span> to confirm deletion.
                </p>
            </div>
    
            <div>
                <x-input-label for="name" value="Confirm Project Name" class="sr-only" required />
    
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    required
                    class="mt-2 block w-full border-border bg-background"
                    placeholder="Enter project name"
                />
    
                <x-input-error :messages="$errors->deleteProject->get('name')" class="mt-2" />
            </div>
    
            <div class="mt-8 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>
    
                <x-danger-button x-bind:disabled="submitting" class="disabled:opacity-20 disabled:cursor-not-allowed">
                    <span x-show="!submitting">Delete</span>
                    <span x-show="submitting">Deleting...</span>
                </x-danger-button>
            </div>
    
        </form>
    
    </x-modal>
</section>