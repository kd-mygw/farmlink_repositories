<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'crop_name' => 'required|string|max:255',
            'task_name' => 'required|string|max:255',
        ]);

        Task::create([
            'crop_name' => $request->crop_name,
            'task_name' => $request->task_name,
        ]);

        return redirect()->route('ledger.tasks')->with('success', '作業が登録されました。');
    }
}
