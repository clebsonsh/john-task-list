<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\StoreTaskRequest;
use App\Http\Requests\Api\V1\UpdateTaskRequest;
use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(Task::with('attachments')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $files = $request->file('attachments');
        $time = time();

        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $path = 'storage/' .  $file->storeAs('attachments/' . $task->id, $time . '_' . $name, 'public');

            $task->attachments()->create([
                'name' => $name,
                'path' => $path,
            ]);

            $time++;
        }

        return new TaskResource($task->load('attachments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return new TaskResource($task->load('attachments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        $task->completed_at = $task->completed ? now() : null;
        $task->deleted_at = null;
        $task->save();

        $task->attachments()->delete();

        $files = $request->file('attachments');
        $time = time();

        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $path = 'storage/' .  $file->storeAs('attachments/' . $task->id, $time . '_' . $name, 'public');

            $task->attachments()->create([
                'name' => $name,
                'path' => $path,
            ]);

            $time++;
        }

        return new TaskResource($task->load('attachments'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->deleted_at = now();
        $task->save();
    }
}
