<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'acquisition_date' => 'nullable|date',
            'unit_price' => 'nullable|numeric',
        ]);

        Equipment::create([
            'name' => $request->name,
            'model' => $request->model,
            'manufacturer' => $request->manufacturer,
            'fuel_type' => $request->fuel_type,
            'acquisition_date' => $request->acquisition_date,
            'unit_price' => $request->unit_price,
        ]);

        return redirect()->route('ledger.equipment')->with('success', '機械設備が登録されました。');
    }
}
