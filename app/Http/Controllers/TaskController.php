<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lmottasin\LaravelPermissionEditor\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }
}
