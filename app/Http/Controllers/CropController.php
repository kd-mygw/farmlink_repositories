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
    public function store(Request $request)
    {
        $validated = $request->validate([

            'product_name' => 'require|string|max:255',
            'name' => 'require|string|max:255',
            'cultivation_method' => 'require|string',
            'fertilizer_info' => 'nullable|string|max:255',
            'pesticide_info' => 'nulable|string|max:255',
            'description' => 'require|string|max:255',
            'cooking_tips' => 'require|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',

        ]);
        
        

    }
    
    // 新規農作物の保存

    // 農作物の編集フォームを表示

    // 農作物の更新

    // 農作物の削除
}
