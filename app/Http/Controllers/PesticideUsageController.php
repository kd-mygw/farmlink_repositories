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
use App\Models\PesticideUsageField;
use App\Models\PesticideUsageSeed;
use App\Models\PesticideUsageSoil;

class PesticideUsageController extends Controller
{
    public function index()
    {
        // 圃場用の一覧
        $fieldUsages = PesticideUsageField::with(['cropping','field','pesticide','worker','equipment'])->get();
        // 種苗用の一覧
        $seedUsages = PesticideUsageSeed::with(['cropping','seed','pesticide','worker','equipment'])->get();
        // 床土用の一覧
        $soilUsages = PesticideUsageSoil::with(['cropping','soil','pesticide','worker','equipment'])->get();

        return view('records.pesticide_usage.index', compact('fieldUsages','seedUsages','soilUsages'));
    }

    // 圃場用の新規登録フォーム
    public function createField()
    {
        $croppings = Cropping::all();
        $fields = Field::all();
        $pesticides = Pesticide::all();
        $workers = Worker::all();
        $equipments = Equipment::all();

        return view('records.pesticide_usage.create_field', compact('croppings','fields','pesticides','workers','equipments')); 
    }

    // 種苗用の新規登録フォーム
    public function createSeed()
    {
        $seeds = Seed::with('item')->get();

        $croppings = Cropping::all();
        $pesticides = Pesticide::all();
        $workers = Worker::all();
        $equipments = Equipment::all();

        return view('records.pesticide_usage.create_seed', compact('croppings','seeds','pesticides','workers','equipments')); 
    }

    // 床土用の新規登録フォーム
    public function createSoil()
    {
        $croppings = Cropping::all();
        $soils = Soil::all();
        $pesticides = Pesticide::all();
        $workers = Worker::all();
        $equipments = Equipment::all();

        return view('records.pesticide_usage.create_soil', compact('croppings','soils','pesticides','workers','equipments')); 
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
            'equipment_id'   => 'nullable|exists:equipment,id',
            'memo'         => 'nullable|string',
        ]);

        // 例: PesticideUsageFieldモデルがあると仮定
        // DB保存
        PesticideUsageField::create([
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
            'equipment_id'   => 'nullable|exists:equipment,id',
            'memo'         => 'nullable|string',
        ]);

        PesticideUsageSeed::create([
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
            'equipment_id'   => 'nullable|exists:equipment,id',
            'memo'         => 'nullable|string',
        ]);

        PesticideUsageSoil::create([
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
