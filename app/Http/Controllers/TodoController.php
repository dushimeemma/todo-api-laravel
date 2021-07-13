<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  response()->json([
            'message' => 'Todos retrieved successfully',
            'data' => ['todos' => Todo::all()],
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        return  response()->json([
            'message' => 'Todo created successfully',
            'data' => ['todo' => Todo::create($request->all())]
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  response()->json([
            'message' => 'retrieved successfully',
            'data' => ['todo' => Todo::find($id),]
        ], 200);
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
        $product = Todo::find($id);
        $product->update($request->all());
        return response()->json([
            'message' => 'updated successfully',
            'data' => ['todo' => $product,],
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::destroy($id);
        return response()->json(['message' => 'deleted successfully',], 200);
    }

    /**
     * search for a todo by title.
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return response()->json([
            'message' => 'retrieved successfully',
            'data' => ['todos' => Todo::where('title', 'like', '%' . $title . '%')->get()]
        ], 200);
    }
}
