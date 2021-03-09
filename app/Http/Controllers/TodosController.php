<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }
    
    public function delete(Request $request){
        $todo = Todo::find($request->id);
        $todo->delete();
        return redirect('/');
    }
    public function create(Request $request){
        $todos = $request->task;
        Todo::create(['content' => $request->task]);
        return redirect('/');
    }

    public function edit(Request $request){
        $todos = Todo::find($request->id);
        return view('todos.edit',['todos' => $todos]);
    }
    public function update(Request $request){
        $todos = Todo::find($request->id);
        $todos->content = $request->content;
        $todos->save();
        return redirect('/');
    }
}
