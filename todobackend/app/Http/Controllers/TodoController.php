<?php

namespace App\Http\Controllers;

use App\Events\DeleteTodo;
use App\Repositories\TodoRepository;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * @var TodoRepository
     */
    private $todoRepository;

    public function __construct(
        TodoRepository $todoRepository
    ) {
        $this->todoRepository = $todoRepository;
    }

    public function createTodo(Request $request) {

        $todo = $this->todoRepository->createTodo($request);
        return response()->json(['error' => $todo]);
    }

    public function deleteTodo(Request $request) {

        $response = $this->todoRepository->deleteTodo($request);
        return response()->json(['error' => $response]);
    }

    public function getList()
    {
        $list = $this->todoRepository->getAllTodos();
        return response()->json(['error' => false, 'list' => $list]);
    }

    public function toggleTodo(Request $request) {

        $response = $this->todoRepository->toggleTodo($request);
        return response()->json(['error' => $response]);
    }

    public function textTodo(Request $request) {

        $response = $this->todoRepository->textTodo($request);
        return response()->json(['error' => $response]);
    }
}
