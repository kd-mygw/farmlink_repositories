<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {
        return view('materials.index');
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
}
