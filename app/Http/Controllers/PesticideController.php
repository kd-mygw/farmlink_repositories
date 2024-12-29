<?php

namespace App\Http\Controllers;

use App\Models\Pesticide;
use Illuminate\Http\Request;

class PesticideController extends Controller
{
    // 農薬の一覧表示
    public function index()
    {
        $pesticides = Pesticide::all();

        return view('materials.pesticides.index', compact('pesticides'));
    }

    // 農薬の新規登録フォーム
    public function create()
    {
        return view('materials.pesticides.create',);
    }

    // 農薬の新規登録処理
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active_ingredient' => 'required|string|max:255',
            'purchase_date' => 'nullable|date',
            'quantity' => 'required|numeric|min:0',
            'application_rate' => 'required|numeric|min:0',
            'lot_number' => 'nullable|string|max:255',
        ]);

        Pesticide::create($request->all());

        return redirect()->route('materials.pesticides.index')->with('success', '農薬が登録されました。');
    }

    // 農薬の編集フォーム
    public function edit(Pesticide $pesticide)
    {
        return view('materials.pesticides.edit', compact('pesticide'));
    }

    // 農薬の更新処理
    public function update(Request $request, Pesticide $pesticide)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active_ingredient' => 'required|string|max:255',
            'purchase_date' => 'nullable|date',
            'quantity' => 'required|numeric|min:0',
            'application_rate' => 'required|numeric|min:0',
            'lot_number' => 'nullable|string|max:255',
        ]);

        $pesticide->update($request->all());

        return redirect()->route('materials.pesticides.index')->with('success', '農薬が更新されました。');
    }
}
