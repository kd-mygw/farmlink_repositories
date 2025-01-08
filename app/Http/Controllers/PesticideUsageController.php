<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cropping;
use App\Models\Field;
use App\Models\Seed;
use App\Models\Soil;
use App\Models\Pesticide;
use App\Models\Worker;
use App\Models\Equipment;

class PesticideUsageController extends Controller
{
    public function index()
    {
        // 各プルダウン用のデータを取得
        $croppings = Cropping::all();
        $fields    = Field::all();
        $seeds     = Seed::all();
        $soils     = Soil::all();
        $pesticides = Pesticide::all();
        $workers   = Worker::all();
        $equipments  = Equipment::all();

        return view('records.pesticide_usage.index', compact('croppings', 'fields', 'seeds', 'soils', 'pesticides', 'workers', 'equipments'));
    }

    // 圃場: 登録
    public function storeField(Request $request)
    {
        $request->validate([
            'date'         => 'required|date',
            'cropping_id'  => 'required|exists:croppings,id',
            'field_id'     => 'required|exists:fields,id',
            'pesticide_id' => 'required|exists:pesticides,id',
            'dilution'     => 'required|numeric|min:1', 
            'usage_amount' => 'required|numeric|min:0.01',
            'worker_id'    => 'nullable|exists:workers,id',
            'equipment_id'   => 'nullable|exists:equipments,id',
            'memo'         => 'nullable|string',
        ]);

        // 例: PesticideUsageFieldモデルがあると仮定
        // DB保存
        \App\Models\PesticideUsageField::create([
            'date'         => $request->date,
            'cropping_id'  => $request->cropping_id,
            'field_id'     => $request->field_id,
            'pesticide_id' => $request->pesticide_id,
            'dilution'     => $request->dilution,
            'usage_amount' => $request->usage_amount,
            'worker_id'    => $request->worker_id,
            'equipment_id'   => $request->equipment_id,
            'memo'         => $request->memo,
        ]);

        return redirect()->route('record.pesticide_usage.index')->with('success', '圃場への農薬使用を登録しました。');
    }

    // 種苗: 登録
    public function storeSeed(Request $request)
    {
        $request->validate([
            'date'         => 'required|date',
            'cropping_id'  => 'required|exists:croppings,id',
            'seed_id'      => 'required|exists:seeds,id',
            'pesticide_id' => 'required|exists:pesticides,id',
            'dilution'     => 'required|numeric|min:1', 
            'usage_amount' => 'required|numeric|min:0.01',
            'worker_id'    => 'nullable|exists:workers,id',
            'equipment_id'   => 'nullable|exists:equipments,id',
            'memo'         => 'nullable|string',
        ]);

        \App\Models\PesticideUsageSeed::create([
            // ... 同様に保存
            'date'         => $request->date,
            'cropping_id'  => $request->cropping_id,
            'seed_id'      => $request->seed_id,
            'pesticide_id' => $request->pesticide_id,
            'dilution'     => $request->dilution,
            'usage_amount' => $request->usage_amount,
            'worker_id'    => $request->worker_id,
            'equipment_id' => $request->equipment_id,
            'memo'         => $request->memo,
        ]);

        return redirect()->route('record.pesticide_usage.index')->with('success', '種苗への農薬使用を登録しました。');
    }

    // 床土: 登録
    public function storeSoil(Request $request)
    {
        $request->validate([
            'date'         => 'required|date',
            'cropping_id'  => 'required|exists:croppings,id',
            'soil_id'      => 'required|exists:soils,id',        // 床土用
            'pesticide_id' => 'required|exists:pesticides,id',
            'dilution'     => 'required|numeric|min:1', 
            'usage_amount' => 'required|numeric|min:0.01',
            'worker_id'    => 'nullable|exists:workers,id',
            'equipment_id'   => 'nullable|exists:equipments,id',
            'memo'         => 'nullable|string',
        ]);

        \App\Models\PesticideUsageSoil::create([
            // ... 同様に保存
            'date'         => $request->date,
            'cropping_id'  => $request->cropping_id,
            'soil_id'      => $request->soil_id,
            'pesticide_id' => $request->pesticide_id,
            'dilution'     => $request->dilution,
            'usage_amount' => $request->usage_amount,
            'worker_id'    => $request->worker_id,
            'equipment_id' => $request->equipment_id,
            'memo'         => $request->memo,
        ]);

        return redirect()->route('record.pesticide_usage.index')->with('success', '床土への農薬使用を登録しました。');
    }
}
