<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Task;


class VerifyTaskOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $taskId = $request->route('id');
        $task = Task::findOrFail($taskId);

        // Verify that authenticated user has permissions on the task
        if ($task->user_id !== auth()->id()) {
            return response()->json(['error' => 'No tienes permiso para acceder a esta tarea.'], 403);
        }

        return $next($request);
    }
}
