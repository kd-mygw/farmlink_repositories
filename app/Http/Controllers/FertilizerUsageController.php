<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cropping;
use App\Models\Field;
use App\Models\Seed;
use App\Models\Soil;
use App\Models\Fertilizer;
use App\Models\Worker;
use App\Models\Equipment;
use App\Models\FertilizerUsageField;
use App\Models\FertilizerUsageSeed;
use App\Models\FertilizerUsageSoil;

class FertilizerUsageController extends Controller
{
    //

    public function index()
    {
        // 圃場用一覧
        $fieldUsages = FertilizerUsageField::with(['cropping', 'field', 'fertilizer', 'worker', 'equipment'])->get();
        // 種苗用の一覧

        $seedUsages = FertilizerUsageSeed::with(['cropping', 'seed', 'fertilizer', 'worker', 'equipment'])->get();
        // 床土用の一覧
        $soilUsages = FertilizerUsageSoil::with(['cropping', 'soil', 'fertilizer', 'worker', 'equipment'])->get();


        return view('records.fertilizer_usage.index', compact('fieldUsages', 'seedUsages', 'soilUsages'));
    }

    // 圃場用の新規登録
    public function createField()
    {
        $croppings = Cropping::all();
        $fields = Field::all();
        $fertilizers = Fertilizer::all();
        $workers = Worker::all();
        $equipments = Equipment::all();

        return view('records.fertilizer_usage.create_field', compact('croppings', 'fields', 'fertilizers', 'workers', 'equipments'));
    }

    // 種苗用の新規登録
    public function createSeed()
    {
        $croppings = Cropping::all();

        $seeds = Seed::all();

        $fertilizers = Fertilizer::all();
        $workers = Worker::all();
        $equipments = Equipment::all();


        return view('records.fertilizer_usage.create_seed', compact('croppings', 'seeds', 'fertilizers', 'workers', 'equipments'));

    }

    // 床土用の新規登録
    public function createSoil()
    {
        $croppings = Cropping::all();

        $soils = Soil::all();

        $fertilizers = Fertilizer::all();
        $workers = Worker::all();
        $equipments = Equipment::all();


        return view('records.fertilizer_usage.create_soil', compact('croppings', 'soils', 'fertilizers', 'workers', 'equipments'));

    }

    // 圃場:登録
    public function storeField(Request $request)
    {
        $request->validate([
            'date'         =>'required|date',
            'cropping_id'  =>'required|exists:croppings,id',
            'field_id'     =>'required|exists:fields,id',
            'fertilizer_id'=>'required|exists:fertilizers,id',
            'usage_amount' =>'required|numeric|min:0.01',
            'unit'         =>'required|string',
            'worker_id'    =>'nullable|exists:workers,id',
            'equipment_id' =>'nullable|exists:equipment,id',
            'memo'         =>'nullable|string',
        ]);

        // DB保存
        FertilizerUsageField::create([
            'date'         =>$request->date,
            'cropping_id'  =>$request->cropping_id,
            'field_id'     =>$request->field_id,
            'fertilizer_id'=>$request->fertilizer_id,
            'usage_amount' =>$request->usage_amount,
            'unit'         =>$request->unit,
            'worker_id'    =>$request->worker_id,
            'equipment_id' =>$request->equipment_id,
            'memo'         =>$request->memo,
        ]);

        return redirect()->route('record.fertilizer_usage.index')->with('success','圃場への肥料情報を登録しました。');
    }

    // 種苗:登録
    public function storeSeed(Request $request)
    {
        $request->validate([
            'date'         =>'required|date',
            'cropping_id'  =>'required|exists:croppings,id',

            'seed_id'      =>'required|exists:seeds,id',

            'fertilizer_id'=>'required|exists:fertilizers,id',
            'usage_amount' =>'required|numeric|min:0.01',
            'unit'         =>'required|string',
            'worker_id'    =>'nullable|exists:workers,id',
            'equipment_id' =>'nullable|exists:equipment,id',
            'memo'         =>'nullable|string',
        ]);

        // DB保存
        FertilizerUsageSeed::create([
            'date'         =>$request->date,
            'cropping_id'  =>$request->cropping_id,

            'seed_id'      =>$request->seed_id,

            'fertilizer_id'=>$request->fertilizer_id,
            'usage_amount' =>$request->usage_amount,
            'unit'         =>$request->unit,
            'worker_id'    =>$request->worker_id,
            'equipment_id' =>$request->equipment_id,
            'memo'         =>$request->memo,
        ]);

        return redirect()->route('record.fertilizer_usage.index')->with('success','種苗への肥料情報を登録しました。');
    }

    // 床土:登録
    public function storeSoil(Request $request)
    {
        $request->validate([
            'date'         =>'required|date',
            'cropping_id'  =>'required|exists:croppings,id',

            'soil_id'     =>'required|exists:soils,id',

            'fertilizer_id'=>'required|exists:fertilizers,id',
            'usage_amount' =>'required|numeric|min:0.01',
            'unit'         =>'required|string',
            'worker_id'    =>'nullable|exists:workers,id',
            'equipment_id' =>'nullable|exists:equipment,id',
            'memo'         =>'nullable|string',
        ]);

        // DB保存
        FertilizerUsageSoil::create([
            'date'         =>$request->date,
            'cropping_id'  =>$request->cropping_id,

            'soil_id'     =>$request->soil_id,

            'fertilizer_id'=>$request->fertilizer_id,
            'usage_amount' =>$request->usage_amount,
            'unit'         =>$request->unit,
            'worker_id'    =>$request->worker_id,
            'equipment_id' =>$request->equipment_id,
            'memo'         =>$request->memo,
        ]);

        return redirect()->route('record.fertilizer_usage.index')->with('success','床土への肥料情報を登録しました。');
    }
}
