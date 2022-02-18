<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTodoList;

class TodoListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = TodoList::with('user')->orderBy('created_at', 'desc')->get();

        foreach ($tasks as $key => $task) {
            if ($tasks[$key]->status == 'open')
                $open[] = $task;

            if ($tasks[$key]->status == 'in_progress')
                $in_progress[] = $task;

            if ($tasks[$key]->status == 'done')
                $done[] = $task;
        }

        return view(
            'todo.index',
            [
                'open' => isset($open) ? $open : [],
                'in_progress' => isset($in_progress) ? $in_progress : [],
                'done' => isset($done) ? $done : [],
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
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoList $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        if (!$validated) {
            return response()->json($validated->errors()->all());
        }
        $todo = TodoList::create($validated);

        return response()->json($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(TodoList::with('user')->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = TodoList::findOrFail($id);

        return view('todo.edit', ['list' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTodoList $request, $id)
    {
        $todo = TodoList::findOrFail($id);

        $validated = $request->validated();
        $todo->fill($validated);
        $todo->save();

        session()->flash('status', 'Update success.');

        return redirect()->route('todo-list.show', ['todo' => $todo->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = TodoList::findOrFail($id);
        if ($todo->delete()) {
            return response()->json(['message' => 'The task was deleted.', 'status' => 1]);
        }

        return response()->json(['message' => 'There is an error.', 'status' => 0]);
    }
}
