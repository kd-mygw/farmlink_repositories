<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    // カテゴリ全体の一覧表示
    public function index()
    {
        return view('materials.index');
    }

    // ---------------------種苗の一覧表示----------------------------
    public function seedsIndex()
    {
        $seeds = Material::where('category','種苗')->get();
        return view('materials.seeds.index',compact('seeds'));
    }
    // 種苗の新規登録フォーム
    public function seedsCreate()
    {
        $items = Item::all();
        return view('materials.seeds.create',compact('items'));
    }

    // 種苗の新規登録処理
    public function seedsStore(Request $request)
    {
        $this->validateMaterial($request);

        Material::create([
            'name' => $request->name,
            'category' => '種苗',
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.seeds.index')->with('success', '種苗が登録されました。');
    }
    // 種苗の編集フォーム
    public function seedsEdit(Material $material)
    {
        return view('materials.seeds.edit', compact('material'));
    }

    // 種苗の更新処理
    public function seedsUpdate(Request $request, Material $material)
    {
        $this->validateMaterial($request);

        $material->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.seeds.index')->with('success', '種苗が更新されました。');
    }
    
    // -----------------------農薬の一覧表示---------------------------
    public function pesticidesIndex()
    {
        $materials = Material::where('catehory','農薬')->get();
        return view('materials.pesticides.index',compact('materials'));
    }
    // 農薬の新規登録フォーム
    public function pesticidesCreate()
    {
        return view('materials.pesticides.create');
    }
    // 農薬の新規登録処理
    public function pesticidesStore(Request $request)
    {
        $this->validateMaterial($request);

        Material::create([
            'name' => $request->name,
            'category' => '農薬',
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.pesticides.index')->with('success', '農薬が登録されました。');
    }
    // 農薬の編集フォーム
    public function pesticidesEdit(Material $material)
    {
        return view('materials.pesticides.edit', compact('material'));
    }
    // 農薬の更新処理
    public function pesticidesUpdate(Request $request, Material $material)
    {
        $this->validateMaterial($request);

        $material->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.pesticides.index')->with('success', '農薬が更新されました。');
    }


    // -----------------------肥料の一覧表示---------------------------
    public function fertilizersIndex()
    {
        $materials = Material::where('catehory','肥料')->get();
        return view('materials.fertilizers.index',compact('materials'));
    }
    // 肥料の新規登録フォーム
    public function fertilizersCreate()
    {
        return view('materials.fertilizers.create');
    }
    // 肥料の新規登録処理
    public function fertilizersStore(Request $request)
    {
        $this->validateMaterial($request);

        Material::create([
            'name' => $request->name,
            'category' => '肥料',
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.fertilizers.index')->with('success', '肥料が登録されました。');
    }
    // 肥料の編集フォーム
    public function fertilizersEdit(Material $material)
    {
        return view('materials.fertilizers.edit', compact('material'));
    }
    // 肥料の更新処理
    public function fertilizersUpdate(Request $request, Material $material)
    {
        $this->validateMaterial($request);

        $material->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.fertilizers.index')->with('success', '肥料が更新されました。');
    }
    // -----------------------床土の一覧表示---------------------------
    public function soilsIndex()
    {
        $materials = Material::where('catehory','床土')->get();
        return view('materials.soils.index',compact('materials'));
    }
    // 床土の新規登録フォーム
    public function soilsCreate()
    {
        return view('materials.soils.create');
    }
    // 床土の新規登録処理
    public function soilsStore(Request $request)
    {
        $this->validateMaterial($request);

        Material::create([
            'name' => $request->name,
            'category' => '床土',
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.soils.index')->with('success', '床土が登録されました。');
    }
    // 床土の編集フォーム
    public function soilsEdit(Material $material)
    {
        return view('materials.soils.edit', compact('material'));
    }
    // 床土の更新処理
    public function soilsUpdate(Request $request, Material $material)
    {
        $this->validateMaterial($request);

        $material->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.soils.index')->with('success', '床土が更新されました。');
    }
    // -----------------------資材の一覧表示---------------------------
    public function materialsIndex()
    {
        $materials = Material::where('catehory','資材')->get();
        return view('materials.materials.index',compact('materials'));
    }
    // 資材の新規登録フォーム
    public function materialsCreate()
    {
        return view('materials.materials.create');
    }
    // 資材の新規登録処理
    public function materialsStore(Request $request)
    {
        $this->validateMaterial($request);

        Material::create([
            'name' => $request->name,
            'category' => '資材',
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.materials.index')->with('success', '資材が登録されました。');
    }
    // 資材の編集フォーム
    public function materialsEdit(Material $material)
    {
        return view('materials.materials.edit', compact('material'));
    }
    // 資材の更新処理
    public function materialsUpdate(Request $request, Material $material)
    {
        $this->validateMaterial($request);

        $material->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return redirect()->route('materials.materials.index')->with('success', '資材が更新されました。');
    }


    public function create()
    {
        return view('materials.create'); // 資材作成ページ
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|numeric|min:0',
        ]);

        Material::create($validated);

        return redirect()->route('materials.index')->with('success', '資材が作成されました。');
    }

    // 入力バリデーションの共通メソッド
    private function validateMaterial(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|string|max:255',
        ]);
    }
}
