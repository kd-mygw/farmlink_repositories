<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('items.select', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'crop_name' => 'required|string|max:255',
            'variety_name' => 'required|string|max:255',
        ]);

        Item::create([
            'crop_name' => $request->crop_name,
            'variety_name' => $request->variety_name,
        ]);

        return redirect()->route('ledger.items')->with('success', '品目が登録されました。');
    }

    public function select(Request $request)
    {
        $items = Item::all();
        return view('items.select', compact('items'));
    }
}
