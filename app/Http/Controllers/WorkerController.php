<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kana' => 'required|string|max:255',
        ]);

        Worker::create([
            'name' => $request->name,
            'kana' => $request->kana,
        ]);

        return redirect()->route('ledger.workers')->with('success', '作業員が登録されました。');
    }
}
