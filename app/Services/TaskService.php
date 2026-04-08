<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class TaskService
{
    public function list($request)
    {

        $filters = $request->only(['status', 'search']);

        $query = Task::query()->where('user_id', Auth::id());

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['search'])) {
            $query->where('title', 'like', "%{$filters['search']}%");
        }

        return $query->paginate(3)->withQueryString();
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::id();
        return Task::create($data);
    }

    public function update(Task $task, array $data)
    {
        $task->update($data);
        return $task->fresh();
    }

    public function delete(Task $task)
    {
        $task->delete();
    }

    public function status(Task $task)
    {
        $task->status === 'done' ? $task->update(['status' => 'todo']) : $task->update(['status' => 'done']);
    }
}
