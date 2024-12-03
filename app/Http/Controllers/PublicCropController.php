<?php

namespace App\Http\Controllers;
use App\Models\Crop;

use Illuminate\Http\Request;

class PublicCropController extends Controller
{
    // 公開用の農作物詳細ページの表示
    public function show($id)
    {
        // IDから該当する農作物を取得
        $crop = Crop::findOrFail($id);

        // 公開用のビューを表示する
        return view('crops.public_show', compact('crop'));
    }
}
