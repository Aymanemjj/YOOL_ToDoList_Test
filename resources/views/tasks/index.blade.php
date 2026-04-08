<x-main>
    <h1 class="text-2xl font-bold mb-6">My Tasks</h1>

    @if (session('success'))
        <div class="bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded text-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('tasks.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">New Task</a>

        <form action="{{ route('tasks.index') }}" method="GET" class="flex gap-2">


            <input type="text" name="search" class="border border-gray-300 rounded bg-white px-3 py-2 text-sm"
                placeholder="Search...">
            <select name="status" class="border border-gray-300 rounded px-3 py-2 bg-white text-sm">
                <option value="">All</option>
                <option value="todo" {{ request('status') === 'todo' ? 'selected' : '' }}>To Do</option>
                <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>In Progress
                </option>
                <option value="done" {{ request('status') === 'done' ? 'selected' : '' }}>Done</option>
            </select>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">Filter</button>
        </form>
    </div>

    @foreach ($tasks as $task)
        <div
            class="border border-gray-200 rounded p-4 mb-3 {{ $task->status === 'done' ? 'bg-green-100' : 'bg-white' }}">
            <small class="font-semibold text-gray-800">{{ $task->due_date }}</small>
            <h3 class="font-semibold text-gray-800">{{ $task->title }}</h3>
            <p class="text-sm text-gray-500 mt-1">{{ $task->description }}</p>
            <p class="text-sm mt-1">Status: {{ $task->status }}</p>

            <div class="mt-3 flex gap-2">
                <a href="{{ route('tasks.edit', $task) }}"
                    class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">Edit</a>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 cursor-pointer">Delete</button>
                </form>

                <form action="{{ route('tasks.status', $task) }}" method="POST" >
                    @csrf
                    @method('patch')
                    <button type="submit"
                        class="bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700 cursor-pointer">{{$task->status === 'done' ? 'Mark as To Do' : 'Mark as Done' }}</button>
                </form>

            </div>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $tasks->links() }}
    </div>

</x-main>
