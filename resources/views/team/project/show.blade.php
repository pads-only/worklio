<x-app-layout>
  <x-modal name="edit-project" :show="$errors->updateProject->isNotEmpty()" focusable>
    <form method="post" action="{{ route('project.update', [$team->slug, $project->slug]) }}" class="p-6">
            @csrf
            @method('patch')
            <h2 class="text-lg font-medium text-gray-900">
                Edit Project
            </h2>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Name') }}" />

                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    :value="old('name', $project->name)"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Give your project a name') }}"
                />

                <x-input-error :messages="$errors->updateProject->get('name')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="description" value="{{ __('Description') }}" class="" />

                <x-text-input id="description" name="description" type="text" :value="old('description', $project->description)" class="mt-1 block w-full" placeholder="{{ __('Describe your project') }}" />

                <x-input-error :messages="$errors->updateProject->get('description')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="status" value="{{ __('Status') }}" class="" />

                <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="pending" {{ old('status', $project->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in progress" {{ old('status', $project->status) === 'in progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $project->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>

                <x-input-error :messages="$errors->updateProject->get('status')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Update Project') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
  <div class="min-h-screen bg-gray-50 text-gray-900">
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <header class="border-b border-gray-200 pb-6">
      <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
        <div>
          <small class="inline-block rounded-full bg-gray-200 px-3 py-1 text-xs font-medium text-gray-600 capitalize">
            {{ $project->status }}
          </small>
          <h1 class="mt-1 text-2xl font-semibold sm:text-3xl">{{ $project->name }}</h1>
          <p class="mt-2 max-w-2xl text-sm text-gray-600 sm:text-base">
            {{ $project->description }}.
          </p>

          <div class="mt-4 flex flex-wrap items-center gap-4 text-sm text-gray-600">
            <div class="flex -space-x-2">
              <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">JD</div>
              <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">MS</div>
              <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">PR</div>
              <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gray-300 text-xs font-medium">AL</div>
            </div>
            <span>+8 members</span>
            <span>24 active tasks</span>
          </div>
        </div>

        <div class="flex flex-wrap gap-2">
          <x-secondary-button x-data="" x-on:click="$dispatch('open-modal', 'edit-project')" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:border-indigo-500 hover:text-indigo-600">
            Edit 
          </x-secondary-button>
          <a href="{{ route('team.invite.create', $team->slug) }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:border-indigo-500 hover:text-indigo-600">Invite Members</a>
          <x-primary-button>
            Create Task
          </x-primary-button>
        </div>
      </div>
    </header>

    <div class="mt-6 grid gap-8 lg:grid-cols-12">
      <main class="lg:col-span-8">
        <section class="border-b border-gray-200 pb-4">
          <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <div>
              <h2 class="text-lg font-medium">Tasks</h2>
              <p class="text-sm text-gray-600">Current work assigned across the team.</p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row">
              <select class="rounded-lg border border-gray-300 px-4 py-2 text-sm outline-none focus:border-indigo-500">
                <option>All Status</option>
                <option>Todo</option>
                <option>In Progress</option>
                <option>Completed</option>
              </select>

              <input
                type="text"
                placeholder="Search tasks..."
                class="rounded-lg border border-gray-300 px-4 py-2 text-sm outline-none focus:border-indigo-500"
              />
            </div>
          </div>
        </section>

        <section>
          <div class="border-b border-gray-200 py-5">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
              <div>
                <div class="flex items-center gap-2">
                  <h3 class="font-medium">Finalize onboarding flow</h3>
                  <span class="rounded-lg border border-indigo-200 bg-indigo-50 px-2 py-1 text-xs text-indigo-700">
                    In Progress
                  </span>
                </div>
                <p class="mt-2 text-sm text-gray-600">
                  Improve the onboarding experience and activation flow for new users.
                </p>
              </div>

              <button class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">
                View
              </button>
            </div>

            <div class="mt-4 flex flex-wrap items-center gap-4 text-sm text-gray-500">
              <span>Assigned to Maria Santos</span>
              <span>Due May 18</span>
              <span>Project: Dashboard Redesign</span>
            </div>
          </div>

          <div class="border-b border-gray-200 py-5">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
              <div>
                <div class="flex items-center gap-2">
                  <h3 class="font-medium">Review task assignment logic</h3>
                  <span class="rounded-lg border border-gray-300 bg-gray-50 px-2 py-1 text-xs text-gray-700">
                    Todo
                  </span>
                </div>
                <p class="mt-2 text-sm text-gray-600">
                  Validate task ownership flow and assignment edge cases.
                </p>
              </div>

              <button class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">
                View
              </button>
            </div>

            <div class="mt-4 flex flex-wrap items-center gap-4 text-sm text-gray-500">
              <span>Assigned to Juan Dela Cruz</span>
              <span>Due May 20</span>
              <span>Project: Task Assignment Flow</span>
            </div>
          </div>

          <div class="border-b border-gray-200 py-5">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
              <div>
                <div class="flex items-center gap-2">
                  <h3 class="font-medium">Update analytics widgets</h3>
                  <span class="rounded-lg border border-green-200 bg-green-50 px-2 py-1 text-xs text-green-700">
                    Completed
                  </span>
                </div>
                <p class="mt-2 text-sm text-gray-600">
                  Add reporting widgets for project and team productivity.
                </p>
              </div>

              <button class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">
                View
              </button>
            </div>

            <div class="mt-4 flex flex-wrap items-center gap-4 text-sm text-gray-500">
              <span>Assigned to Paolo Reyes</span>
              <span>Completed May 12</span>
              <span>Project: Analytics Dashboard</span>
            </div>
          </div>
        </section>
      </main>

      <aside class="lg:col-span-4 bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
        <section class="border-b border-gray-200 pb-5">
          <h2 class="text-lg font-medium">Task Overview</h2>

          <div class="mt-4 space-y-4 text-sm text-gray-700">
            <div class="flex items-center justify-between">
              <span>Todo</span>
              <span class="font-medium">9</span>
            </div>

            <div class="flex items-center justify-between">
              <span>In Progress</span>
              <span class="font-medium">11</span>
            </div>

            <div class="flex items-center justify-between">
              <span>Completed</span>
              <span class="font-medium">28</span>
            </div>
          </div>
        </section>

        <section class="pt-5">
          <h2 class="text-lg font-medium">Quick Actions</h2>

          <div class="mt-4 space-y-2">
            <button class="block w-full rounded-lg border border-gray-300 px-4 py-2 text-left text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">
              Assign Task
            </button>

            <button class="block w-full rounded-lg border border-gray-300 px-4 py-2 text-left text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">
              Create Project
            </button>

            <button class="block w-full rounded-lg border border-gray-300 px-4 py-2 text-left text-sm text-gray-700 hover:border-indigo-500 hover:text-indigo-600">
              Leave Team
            </button>
          </div>
        </section>
      </aside>
    </div>
  </div>
</div>
</x-app-layout>