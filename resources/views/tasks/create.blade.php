<x-main>
    <h1 class="text-2xl font-bold mb-6">New Task</h1>


    <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-4 border-gray-200 border flex flex-col">
        @csrf

        <label for="title" class="mt-3 font-bold">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}"
            class="mt-1 px-3 py-2 border border-gray-300 rounded @error('title') border-red-500 @enderror">
        @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <label for="due_date" class="mt-3 font-bold">Due Date:</label>
        <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}"
            class="mt-1 px-3 py-2 border border-gray-300 rounded @error('due_date') border-red-500 @enderror">
        @error('due_date')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <label for="description" class="mt-3 font-bold">Description:</label>
        <textarea name="description" id="description" rows="4" class="mt-1 px-3 py-2 border border-gray-300 rounded">{{ old('description') }}</textarea>

        <label for="status" class="mt-3 font-bold">Status:</label>
        <select name="status" id="status" class="mt-1 px-3 py-2 border border-gray-300 rounded">
            <option value="todo">To Do</option>
            <option value="in_progress">In Progress</option>
            <option value="done">Done</option>
        </select>

        <button type="submit" class="mt-6 py-2 bg-blue-600 text-white rounded cursor-pointer hover:bg-blue-700">
            Create
        </button>
    </form>

    <br>
    <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:underline">Back to list</a>

</x-main>
