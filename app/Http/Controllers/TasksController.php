<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $department_id = session('department_id') !== null ? session('department_id') : $request->user()->department_id;
        
        $open = Task::where([
            ['status', 'open'],
            ['department_id', $department_id],
        ])->orderBy('created_at', 'desc')->get();

        $in_progress = Task::where([
            ['status', 'in_progress'],
            ['department_id', $department_id],
        ])->orderBy('created_at', 'desc')->get();

        $done = Task::where([
            ['status', 'done'],
            ['department_id', $department_id],
        ])->orderBy('created_at', 'desc')->get();

        return view(
            'tasks.index',
            [
                'open' => $open,
                'in_progress' => $in_progress,
                'done' => $done,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;
        $validated['department_id'] = $request->user()->department_id;
        $validated['department_id'] = session('department_id') !== null ? session('department_id') : $request->user()->department_id;

        $task = Task::create($validated);

        session()->flash('status', 'The task was created!');

        return redirect()->route('tasks.show', ['task' => $task->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::with('user', 'comments')->findOrFail($id);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTask $request, $id)
    {
        $task = Task::findOrFail($id);

        $this->authorize('tasks.update', $task);

        $validated = $request->validated();
        $task->fill($validated);
        $task->save();

        session()->flash('status', 'The task was updated!');

        return redirect()->route('tasks.show', ['task' => $task->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        session()->flash('status', 'The task was deleted!');

        return redirect()->route('tasks.index');
    }
}
