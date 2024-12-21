<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Seed;
use App\Models\Item;

class SeedController extends Controller
{
    public function index()
    {
        $seeds = Seed::all();
        return view('materials.seeds.index', compact('seeds'));
    }

    public function create()
    {
        $items = Item::all(); // 品目リスト取得
        return view('materials.seeds.create', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'purchase_date' => 'required|date',
            'content_volume' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'expiry_date' => 'nullable|date',
            'lot_number' => 'nullable|string|max:255',
        ]);

        Seed::create($validated);

        return redirect()->route('materials.seeds.index')->with('success', '種苗が登録されました。');
    }
}
