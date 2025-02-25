<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        // Check if the user is authenticated using the Auth facade
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Get tasks for the logged-in user using the Auth facade
        $tasks = Auth::user()->tasks;  // No need for ->get(), as tasks() returns a collection

        return view('tasks.index', compact('tasks'));  // Pass tasks to the view
    }
}
