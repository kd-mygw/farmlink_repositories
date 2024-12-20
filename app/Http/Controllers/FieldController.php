<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string|max:255',
            'area' => 'required|numeric',
            'area_unit' => 'required|string',
            'ownership' => 'required|string',
        ]);

        Field::create([
            'type' => $request->type,
            'name' => $request->name,
            'area' => $request->area,
            'area_unit' => $request->area_unit,
            'ownership' => $request->ownership,
        ]);

        return redirect()->route('ledger.fields')->with('success', '圃場が登録されました。');
    }
}
