<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function all()
    {
        $user = auth()->user();
        return Task::where('user_id', $user->id)->get();
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function find($id)
    {
        return Task::findOrFail($id);
    }

    public function update(Task $task, array $data)
    {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task)
    {
        $task->delete();
    }
}