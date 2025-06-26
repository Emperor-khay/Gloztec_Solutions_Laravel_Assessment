@if($this->addModal)
    <!-- Modal Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" >

        <!-- Modal Box -->
        <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-6">

            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-xl font-semibold text-gray-800">Create Task</h3>
                <button class="text-gray-400 hover:text-gray-600 text-2xl font-bold" wire:click="close">&times;</button>
            </div>

            <form  wire:submit="save">
                @csrf

                <!-- Modal Body -->
                <div class="mt-4 text-gray-600 rounded-ts">

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" wire:model="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" >
                        @error('title')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea wire:model="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"></textarea>
                        @error('description')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                        <input type="date" wire:model="due" id="due" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" >
                        @error('due')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="mt-6 flex justify-between space-x-3">
                    <button class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 w-full" type="submit">
                    Confirm
                    </button>
                </div>

            </form>
        </div>
    </div>
@endif

