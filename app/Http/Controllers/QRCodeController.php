<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
use Endroid\QrCode\Encoding\Encoding;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
// use Intervention\Image\ImageManagerStatic as Image;

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
        
        $imageInfo = getimagesize($userIconPath);
        if ($imageInfo['mime'] == 'image/jpeg'){
            $image = imagecreatefromjpeg($userIconPath);//jpegの場合
        } elseif ($imageInfo['mime'] == 'image/png'){
            $image = imagecreatefrompng($userIconPath);//pngの場合
        } else {
            abort(400, 'Unsupported image format');
        }

        //アイコン画像をリサイズ
        list($originalWidth, $originalHeight) = getimagesize($userIconPath);
        $newWidth = 73;
        $newHeight = ($originalHeight / $originalWidth) * $newWidth;

        $resizedImage = imagescale($image, $newWidth, $newHeight);

        $resizedIconPath = storage_path('app/public/temp_resized_icon.png');
        imagepng($resizedImage, $resizedIconPath);

        // QRコードの生成
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($qrCodeUrl)
            ->size(300)
            ->margin(10)
            ->encoding(new Encoding('UTF-8'))
            ->logoPath($resizedIconPath)
            // ->logoResizeToWidth(73) // logoの幅を設定
            // ->logoResizeToHeight(73) // logoの高さを設定
            ->build();
    
        // QRコードの画像を保存
        $result->saveToFile(storage_path('app/public/' . $qrCodePath));
    
        // 必要に応じてデータベースにパスを保存
        $crop->qr_code_path = $qrCodePath;
        $crop->save();
    
        return redirect()->route('crops.index')->with('success', 'QRコードが生成されました');
    }
}
