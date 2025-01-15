<?php

namespace App\Http\Controllers;



use App\Models\Crop;
use App\Models\Template;
use App\Models\Cropping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Pesticide;
use App\Models\Fertilizer;
use Pest\Plugins\Parallel\Handlers\Pest;

class CropController extends Controller
{
    //農作物の一覧を表示
    public function index(Request $request)
    {
        $query = Crop::where('user_id', Auth::id());
    
        // 検索条件がある場合にフィルタリング
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('product_name', 'like', "%{$search}%")
                  ->orWhere('cultivation_method', 'like', "%{$search}%");
            });        
        }
        // ページネーション
        $crops = $query->orderBy('created_at','desc')->paginate(10);
    
        return view('crops.index', compact('crops'));
    }

    // 新規農作物の登録フォームを表示
    public function create()
    {
        // 作付け一覧を取ってビューに渡す
        // 例えばUserごとに作付けを管理しているならUserフィルターを入れても良い
        $croppings = Cropping::with('item')->get();
        $pesticides = Pesticide::all();
        $fertilizers = Fertilizer::all();
    
        return view('crops.create', compact('croppings', 'pesticides', 'fertilizers'));
    }
    
    // 新規農作物の保存
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255', //商品名
            'name' => 'required|string|max:255',    //品種名
            'cultivation_method' => 'required|string|max:255', //栽培方法
            'fertilizers' => 'nullable|array', //肥料情報
            'fertilizers.*' => 'exists:fertilizers,id',
            'pesticide' => 'nullable|array', //農薬情報
            'pesticides.*' => 'exists:pesticides,id',
            'description' => 'nullable|string', //作物の説明
            'cooking_tips' => 'nullable|string', //料理のコツ
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //画像
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000', //動画
        ]); 
        
        $data = $request->all();
        $data['fertilizer_info'] = isset($request->fertilizers) ? implode(',', $request->fertilizers) : null;
        $data['pesticide_info'] = isset($request->pesticides) ? implode(',', $request->pesticides) : null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // 複数画像の保存
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('crops-image', 'public'); // 保存パスの取得
                $images[] = $path; // 保存パスを配列に追加
            }
            $data['images'] = json_encode($images); // JSON形式で保存
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'cultivation_method' => 'required|string',
            'fertilizer_info' => 'nullable|string|max:255',
            'pesticide_info' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'cooking_tips' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
        ]);
    
        // 指定されたIDの農作物を取得
        $crop = Crop::where('user_id', Auth::id())->findOrFail($id);
    
        // 更新データの取得
        $data = $request->all();
    
        // 既存画像の削除処理
        if ($request->has('delete_images')) {
            $existingImages = json_decode($crop->images, true) ?? [];
            $remainingImages = array_diff($existingImages, $request->input('delete_images'));
    
            // ストレージから削除
            foreach ($request->input('delete_images') as $image) {
                Storage::disk('public')->delete($image);
            }
    
            $data['images'] = json_encode($remainingImages);
        } else {
            $data['images'] = $crop->images; // 削除指定がない場合はそのまま
        }
    
        // 新しい画像のアップロード
        if ($request->hasFile('images')) {
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('crops-image', 'public');
                $newImages[] = $path;
            }
    
            // 既存画像と新しい画像をマージ
            $existingImages = json_decode($data['images'], true) ?? [];
            $data['images'] = json_encode(array_merge($existingImages, $newImages));
        }
    
        // 動画のアップロード
        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('videos', 'public');
        }
    
        // データベースの更新
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

    public function editTemplate(Crop $crop)
    {
        $templates = Template::all();
        return view('crops.templates', compact('crop', 'templates'));
    }

    public function updateTemplate(Request $request, Crop $crop)
    {
        $validated = $request->validate([
            'template_id' => 'required|exists:templates,id',
        ]);

        // テンプレートIDを更新
        $crop->template_id = $validated['template_id'];
        $crop->save();

        return redirect()->route('crops.index')->with('success', 'テンプレートを更新しました');
    }

    public function preview($id, $template)
    {
        $view = ($template === 'default') ? 'crops.public_show' : $template;
    
        // 渡されたIDから農作物を取得
        $crop = Crop::with('user')->find($id);
        if (!$crop) {
            abort(404, 'Crop not found');
        }
    
        $icon = $crop->user->icon ?? 'default_icon.png';
        $name = $crop->user->name ?? '未登録';
        $farm_name = $crop->user->farm_name ?? '未登録';
        $farm_address = $crop->user->farm_address ?? '未登録';
    
        return view($view, compact('crop', 'icon', 'name', 'farm_name', 'farm_address'));
    }
        
}
