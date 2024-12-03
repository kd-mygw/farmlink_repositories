<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
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
    
        // QRコードを生成
        $qrCodePath = 'qrcodes/' . $crop->id . '.png';
        
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($qrCodeUrl)
            ->size(300)
            ->margin(10)
            ->build();
    
        // QRコードの画像を保存
        $result->saveToFile(storage_path('app/public/' . $qrCodePath));
    
        // 必要に応じてデータベースにパスを保存
        $crop->qr_code_path = $qrCodePath;
        $crop->save();
    
        return redirect()->route('crops.index')->with('success', 'QRコードが生成されました');
    }
}
