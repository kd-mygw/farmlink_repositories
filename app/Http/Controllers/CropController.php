<?php

namespace App\Http\Controllers;



use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CropController extends Controller
{
    //農作物の一覧を表示
    public function index()
    {
        $crops = Crop::where('user_id', Auth::id())->get();
        return view('crops.index', compact('crops'));
    }

    // 新規農作物の登録フォームを表示

    // 新規農作物の保存

    // 農作物の編集フォームを表示

    // 農作物の更新

    // 農作物の削除
}
