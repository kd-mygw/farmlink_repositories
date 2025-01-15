<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        // 例: 適当にDBのモデルから集計したいデータを取得すると想定
        // $someData = Model::select(DB::raw('...'))->get();
        
        // 今回はサンプルとして、グラフに使うダミーデータを用意
        $chartLabels = ['1月','2月','3月','4月','5月'];
        $chartData   = [10, 30, 50, 40, 60]; // 例: 月ごとの売上とか収量など
        
        // ビューに渡す
        return view('data.index', compact('chartLabels','chartData'));   
    }
}
