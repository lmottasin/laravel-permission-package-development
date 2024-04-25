<?php

namespace Lmottasin\LaravelPermissionEditor\Http\Controllers;

use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permission-editor::permissions.index');
    }
}
