<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
use Endroid\QrCode\Encoding\Encoding;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class QRCodeController extends Controller
{
    // QRコード生成画面の表示
    public function create(Crop $crop)
    {
        // 現在のユーザーがこの作物を持っているかチェック
        if ($crop->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('qr.create', compact('crop'));
    }

    // QRコードの生成と保存
    public function store(Request $request, Crop $crop)
    {
        if ($crop->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    
        // QRコードのURL（消費者がアクセスするURL）
        $qrCodeUrl = route('crops.public.show', ['id' => $crop->id]);
    
        // QRコードの保存パス
        $qrCodePath = 'qrcodes/' . $crop->id . '.png';
        
        // アイコン画像パス
        $userIconPath = storage_path('app/public/' . Auth::user()->icon); 
        
        // デフォルトロゴを設定


        // QRコードの生成
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($qrCodeUrl)
            ->size(300)
            ->margin(10)
            ->encoding(new Encoding('UTF-8'))
            ->logoPath($userIconPath)
            ->logoResizeToWidth(60) // logoの幅を設定
            ->logoResizeToHeight(60) // logoの高さを設定
            ->build();
    
        // QRコードの画像を保存
        $result->saveToFile(storage_path('app/public/' . $qrCodePath));
    
        // 必要に応じてデータベースにパスを保存
        $crop->qr_code_path = $qrCodePath;
        $crop->save();
    
        return redirect()->route('crops.index')->with('success', 'QRコードが生成されました');
    }
}
