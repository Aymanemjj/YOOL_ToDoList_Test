<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    use AuthorizesRequests;


    public function __construct(private TaskService $taskService) {}

    public function index(Request $request)
    {
        $tasks = $this->taskService->list($request);

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $this->taskService->create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created.');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);

        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task, UpdateTaskRequest $request)
    {
        $this->authorize('update', $task);
        
        $this->taskService->update($task, $request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $this->taskService->delete($task);

        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }

    public function status(Task $task)
    {
        $this->taskService->status($task);

        return redirect()->back()->with('success, ' . $task->title .  " marked as done.");
    }
}
