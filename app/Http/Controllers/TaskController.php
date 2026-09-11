<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $allowedFilters = [
            'is_done',
            AllowedFilter::partial('title'),
            AllowedFilter::partial('description'),
            AllowedFilter::scope('created_between'),
        ];

        $allowedSorts = [
            'id',
            'title',
            'created_at',
            'is_done',
        ];

        $perPage = (int) $request->query('per_page', 15);

        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters(...$allowedFilters)
            ->defaultSort('-created_at')
            ->allowedSorts(...$allowedSorts)
            ->paginate(
                perPage: $perPage
            );

        return new TaskCollection($tasks);
    }

    public function show(Request $request, Task $task)
    {
        return new TaskResource($task);
    }

    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        $task = Auth::user()->tasks()->create($validated);

        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validated = $request->validated();

        $task->update($validated);

        return new TaskResource($task);
    }

    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
