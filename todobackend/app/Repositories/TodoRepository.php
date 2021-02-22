<?php

namespace App\Repositories;

use App\Events\CreateTodo;
use App\Events\StatusTodo;
use App\Events\TextTodo;
use App\Events\DeleteTodo;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoRepository
{

    public function createTodo(Request $request)
    {
        if (empty($request->text)) {
            return true;
        }

        $newTodo = Todo::create([
            'text' => $request->text,
            'done' => false,
        ]);

        event(new CreateTodo($request->text, $newTodo->id));

        return false;
    }

    public function getAllTodos()
    {
        return Todo::all();
    }

    public function deleteTodo(Request $request)
    {
        Todo::destroy($request->id);
        event(new DeleteTodo($request->id));
        return false;
    }

    public function toggleTodo(Request $request)
    {
        Todo::whereId($request->id)->update(['done' => $request->done]);
        event(new StatusTodo($request->id, $request->done));
        return false;
    }

    public function textTodo(Request $request)
    {
        if (empty($request->text)) {
            return true;
        }

        Todo::whereId($request->id)->update(['text' => $request->text]);
        event(new TextTodo($request->id, $request->text));
        return false;
    }
}
