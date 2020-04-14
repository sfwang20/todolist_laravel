<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Todo;

class TodoController extends Controller
{
  //read users' todos
  public function show()
  {
      $todos = Auth::user()->todos()->orderBy('order')->get();

      return view('/index', ['todos' => $todos]);
  }

  public function store(Request $request)
  {
      $todo = new Todo;
      $todo->fill($request->all());
      $todo->user_id = Auth::id();
      $todo->is_complete = 0;
      $todo->save();

      return response()->json($todo);
  }

  public function update(Request $request, Todo $todo)
  {
    $todo->fill($request->all());
    $todo->save();

    return response()->json($todo);
  }

  public function destroy(Todo $todo)
  {
    $todo->delete();

    return response()->json($todo);
  }

  public function complete(Todo $todo)
  {
    $todo->is_complete = !($todo->is_complete);
    $todo->save();

    return response()->json($todo);
  }

  public function sort(Request $request,Todo $todo)
  {
    $todo->fill($request->all());
    $todo->save();

    return response()->json($todo);
  }
}
