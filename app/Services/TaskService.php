<?php

namespace App\Services;

use App\Models\Task;

use function PHPUnit\Framework\isEmpty;

class TaskService
{
    public function list($filters = [])
    {
        $query = Task::query();

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['search'])) {
            $query->where('title', 'like', "%{$filters['search']}%");
        }

        return $query->paginate(10)->withQueryString();
    }

    public function create(array $data)
    {
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

    public function markAsDone(Task $task)
    {
        $task->update(['status' => 'done']);
    }
}
