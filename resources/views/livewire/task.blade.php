<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Management') }}
        </h2>
    </x-slot>


    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-center gap-5 p-6">
                <div class="space-x-4">
                    <label class="bg-blue-300 text-white p-3 rounded-xl hover:bg-blue-500">
                        <input type="radio" wire:model="filter" value="all" wire:click="noFilter">
                        All
                    </label>
                    <label class="bg-green-300 text-white p-3 rounded-xl hover:bg-green-500">
                        <input type="radio" wire:model="filter" value="completed" wire:click="completed">
                        Completed
                    </label>
                    <label class="bg-yellow-300 text-white p-3 rounded-xl hover:bg-yellow-500">
                        <input type="radio" wire:model="filter" value="pending" wire:click="pending">
                        Pending
                    </label>
                </div>
            </form>
        </div>
    </div>


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white rounded p-2 m-1" wire:click="add">Create Task</button>
                    </div>

                    @forelse ($this->tasks as $task)
                        <div class="border rounded-lg p-4 my-4 bg-gray-50 shadow {{ $task->status === 'completed' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ $task->title }}</h3>
                                <p class="text-gray-600 mb-1 truncate">{{ $task->description }}</p>
                            </div>
                            <div class="mt-2 md:mt-0 text-sm text-gray-500 flex flex-col md:flex-row md:items-center md:justify-between">
                                <p>
                                    Due: <span class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</span>
                                </p>
                                <div>
                                    @if (($task->status !== 'completed'))
                                    <button class="bg-green-500 hover:bg-green-600 text-white rounded p-2 m-1" wire:click="markAsDone({{ $task->id }})">Done</button>
                                    @endif
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white rounded p-2 m-1" wire:click="edit({{ $task->id }})">Edit</button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white rounded p-2 m-1" wire:click="delete({{ $task->id }})">Delete</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No tasks Available</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('modals.task.add')
    @include('modals.task.edit')

</div>
