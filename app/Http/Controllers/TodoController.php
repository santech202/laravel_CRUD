<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allTodos = Todo::all();
        // $allTodos = Todo::select('id', 'title', 'content')->get();
        $filteredTodos = TodoResource::collection($allTodos);
        return $filteredTodos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        //
        $userInputData = $request->all();
        $newTodo = Todo::create($userInputData);
        $filteredTodo = new TodoResource($newTodo);
        return $filteredTodo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //select * from todos where id = 2
        $fetchedTodo = Todo::find($id);
        $filteredTodo = new TodoResource($fetchedTodo);
        return $filteredTodo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        //
        $fetchedTodo = Todo::find($id);
        $fetchedTodo->update($request->all());
        $updatedTodo = new TodoResource($fetchedTodo);

        return $updatedTodo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $fetchedTodo = Todo::find($id);
        $fetchedTodo->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
