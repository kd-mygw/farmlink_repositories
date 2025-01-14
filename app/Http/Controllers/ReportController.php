<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Worker;
use App\Models\Task;

class ReportController extends Controller
{
    // 一覧表示
    public function index()
    {
        $reports = Report::with(['worker', 'task'])->get();

        return view('records.reports.index',compact('reports'));
    }

    // 新規記入フォーム
    public function create()
    {
        // フォームで選択する作業員や作業内容を取得
        $workers = Worker::all();   // 作業員
        $tasks   = Task::all();     // 作業内容

        return view('records.reports.create', compact('workers','tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'      => 'required|date',
            'worker_id' => 'required|exists:workers,id',
            'start_time'=> 'required|date_format:H:i',
            'end_time'  => 'required|date_format:H:i',
            'task_id'   => 'required|exists:tasks,id',
            'memo'      => 'nullable|string',
        ]);

        Report::create([
            'date'      =>$request->date,
            'worker_id' =>$request->worker_id,
            'start_time'=>$request->start_time,
            'end_time'  =>$request->end_time,
            'task_id'   =>$request->task_id,
            'memo'      =>$request->memo,
        ]);

        return redirect()->route('record.report.index')->with('success','作業員日報を登録しました。');
    }


    // 編集、削除追加する
}
