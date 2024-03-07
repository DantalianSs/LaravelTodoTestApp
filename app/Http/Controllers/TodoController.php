<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\TodoItem;
use App\Http\Requests\CreateTodoRequest;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{
    public function index(): View
    {
        $todos = auth()->user()->todos;

        return view('dashboard', compact('todos'));
    }

    public function create()
    {
        return view('components.form');
    }

    public function store(CreateTodoRequest $request): RedirectResponse
    {
        TodoItem::create([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => auth()->user()->getKey(),
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(TodoItem $todo): View
    {
        return view('components.form', compact('todo'));
    }

    public function update(TodoItem $todo, CreateTodoRequest $request): RedirectResponse
    {
        $todo->update($request->all());

        return redirect()->route('dashboard');
    }

    public function done(TodoItem $todo): RedirectResponse
    {
        $todo->delete();

        return redirect()->route('dashboard');
    }


    public function archive(): View
    {
        $todos = auth()->user()->todos()->onlyTrashed()->get();

        return view('archive', compact('todos'));
    }

    public function todoRestore(TodoItem $todo): RedirectResponse
    {
        $todo->restore();

        return redirect()->route('archive');
    }

    public function todoDelete(TodoItem $todo): RedirectResponse
    {
        $todo->forceDelete();

        return redirect()->route('archive');
    }

    public function restoreAll(): RedirectResponse
    {
        $todos = auth()->user()->todos()->onlyTrashed()->get();

        foreach ($todos as $todo) {
            $todo->restore();
        }

        return redirect()->route('archive');
    }

    public function deleteAll(): RedirectResponse
    {
        $todos = auth()->user()->todos()->onlyTrashed()->get();

        foreach ($todos as $todo) {
            $todo->forceDelete();
        }

        return redirect()->route('archive');
    }
}
