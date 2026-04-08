<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService) {}

    public function index()
    {
        $tasks = $this->taskService->list();

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
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task, UpdateTaskRequest $request)
    {
        $this->taskService->update($task, $request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $this->taskService->delete($task);

        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }

    public function markDone(Task $task)
    {
        $this->taskService->markAsDone($task);

        return redirect()->back()->with('success, '. $task->title .  " marked as done.");
    }
}
