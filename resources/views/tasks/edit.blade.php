<x-main>
    <h1 class="text-2xl font-bold mb-6">Edit Task</h1>

    @if($errors->any())
        <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded text-sm mb-4">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="POST" class="bg-white p-4 border-gray-200 border flex flex-col">
        @csrf
        @method('PUT')

        <label for="title" class="mt-3 font-bold">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}"
            class="mt-1 px-3 py-2 border border-gray-300 rounded @error('title') border-red-500 @enderror">
        @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <label for="due_date" class="mt-3 font-bold">Due Date:</label>
        <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}"
            class="mt-1 px-3 py-2 border border-gray-300 rounded @error('due_date') border-red-500 @enderror">
        @error('due_date')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <label for="description" class="mt-3 font-bold">Description:</label>
        <textarea name="description" id="description" rows="4"
            class="mt-1 px-3 py-2 border border-gray-300 rounded">{{ old('description', $task->description) }}</textarea>

        <label for="status" class="mt-3 font-bold">Status:</label>
        <select name="status" id="status"
            class="mt-1 px-3 py-2 border border-gray-300 rounded @error('status') border-red-500 @enderror">
            <option value="todo"        {{ old('status', $task->status) === 'todo'        ? 'selected' : '' }}>To Do</option>
            <option value="in_progress" {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="done"        {{ old('status', $task->status) === 'done'        ? 'selected' : '' }}>Done</option>
        </select>
        @error('status')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <button type="submit" class="mt-6 py-2 bg-green-600 text-white rounded cursor-pointer hover:bg-green-700">
            Update
        </button>
    </form>

    <br>
    <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:underline">Back to list</a>


</x-main>