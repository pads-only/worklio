<section class="space-y-6">
    <x-modal name="edit-project" :show="$errors->updateProject->isNotEmpty()" focusable>
    
        <form method="POST" action="{{ route('project.update', [$team->slug, $project->slug]) }}" class="p-6" x-data="{submitting: false}" @submit.prevent="submitting = true; $el.submit()">
    
            @csrf
            @method('PATCH')
    
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-foreground">
                    Edit Project
                </h2>
    
                <p class="mt-1 text-sm text-muted-foreground">
                    Update project details and status.
                </p>
            </div>
    
            <div class="space-y-5">
    
                <div>
                    <x-input-label for="name" value="Project Name" required />
    
                    <x-text-input
                        id="name"
                        name="name"
                        type="text"
                        :value="old('name', $project->name)"
                        class="mt-2 block w-full border-border bg-background"
                    />
    
                    <x-input-error :messages="$errors->updateProject->get('name')" class="mt-2" />
                </div>
    
                <div>
                    <x-input-label for="description" value="Description" />
    
                    <x-text-input
                        id="description"
                        name="description"
                        type="text"
                        :value="old('description', $project->description)"
                        class="mt-2 block w-full border-border bg-background"
                    />
    
                    <x-input-error :messages="$errors->updateProject->get('description')" class="mt-2" />
                </div>
    
                <div>
                    <x-input-label for="status" value="Status" />
    
                    <select
                        id="status"
                        name="status"
                        class="mt-2 block w-full rounded-md border border-border bg-background px-3 py-2 text-sm text-foreground"
                    >
                        <option value="pending" @selected(old('status', $project->status) === 'pending')>Pending</option>
                        <option value="in progress" @selected(old('status', $project->status) === 'in progress')>In Progress</option>
                        <option value="completed" @selected(old('status', $project->status) === 'completed')>Completed</option>
                    </select>
    
                    <x-input-error :messages="$errors->updateProject->get('status')" class="mt-2" />
                </div>
    
            </div>
    
            <div class="mt-8 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>
    
                <x-primary-button x-bind:disabled="submitting" class="disabled:opacity-20 disabled:cursor-not-allowed">
                    <span x-show="!submitting">Update</span>
                    <span x-show="submitting">Updating...</span>
                </x-primary-button>
            </div>
    
        </form>
    </x-modal>
</section>