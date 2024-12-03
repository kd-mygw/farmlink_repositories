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
    public function create()
    {
        return view('crops.create');
    }

    // 新規農作物の保存
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255', //商品名
            'name' => 'required|string|max:255',    //品種名
            'cultivation_method' => 'required|string|max:255', //栽培方法
            'fertilizer_info' => 'nullable|string', //肥料情報
            'pesticide_info' => 'nullable|string', //農薬情報
            'description' => 'nullable|string', //作物の説明
            'cooking_tips' => 'nullable|string', //料理のコツ
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //画像
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000', //動画
        ]); 
        
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('videos', 'public');
        }

        Crop::create(array_merge($data, ['user_id' => Auth::id()]));
    
        return redirect()->route('crops.index')->with('success', '農作物が登録されました');
        
    }
    

    // 農作物の編集フォームを表示
    public function edit($id)
    {
        // 指定されたIDの農作物を取得し、編集フォームを表示
        $crop = Crop::where('user_id', Auth::id())->findOrFail($id);
        return view('crops.edit', compact('crop'));
    }
    // 農作物の更新
    public function update(Request $request,$id)
    {
        $request->validate([
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

        // 指定されたIDの農作物を取得し、更新
        $crop = Crop::where('user_id', Auth::id())->findOrFail($id);
        $data = $request->all();

        // 画像がアップロードされていれば保存
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // 動画がアップロードされていれば保存
        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('videos', 'public');
        }

        $crop->update($data);

        return redirect()->route('crops.index')->with('success', '農作物が更新されました');
    }

    // 農作物の削除
    public function destroy($id)
    {
        $crop = Crop::where('user_id', Auth::id())->findOrFail($id);
        $crop->delete();

        return redirect()->route('crops.index')->with('success', '農作物が削除されました');
    }
}
