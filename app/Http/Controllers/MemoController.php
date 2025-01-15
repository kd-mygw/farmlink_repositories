<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Worker;

class MemoController extends Controller
{
    // 一覧表示
    public function index()
    {
        $memos = Memo::with(['worker'])->get();

        return view('records.memos.index',compact('memos'));
    }

    // 新規記入フォーム
    public function create()
    {
        // フォームで選択する作業員情報を取得
        $workers = Worker::all();   // 作業員


        return view('records.memos.create',compact('workers'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'date'      =>'required|date',
            'worker_id' =>'required|exists:workers,id',
            'memo'      =>'required|string',
        ]);


        Memo::create([

            'date'=>$request->date,
            'worker_id'=>$request->worker_id,
            'memo'=>$request->memo,
        ]);


        return redirect()->route('record.memo.index')->with('succes','メモを登録しました。');

    }


    // 編集、削除追加する
}
