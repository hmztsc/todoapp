<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        $validated = $request->validated();

        $task_id = $request->input('task_id');

        $validated['user_id'] = $request->user()->id;
        $validated['task_id'] = $task_id;

        $comment = Comment::create($validated);

        session()->flash('status', 'The comment was created!');

        return redirect()->route('tasks.show', ['task' => $task_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::with('task')->findOrFail($id);

        dd($comment);

        $comment->delete();

        session()->flash('status', 'The comment was deleted!');

        return redirect()->route('tasks.index');
    }
}
