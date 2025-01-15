<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cropping;
use App\Models\Item;
use App\Models\Field;
use Illuminate\Container\Attributes\Log;

class CroppingController extends Controller
{
    public function index()
    {
        $croppings = Cropping::all();
        return view('cropping.index', compact('croppings'));
    }

    public function create()
    {
        $fields = Field::all();
        $items = Item::all();
        return view('cropping.create', compact('fields', 'items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'item_id' => 'required|exists:items,id',
            'field_id' => 'required|exists:fields,id',
            'planting_date' => 'required|date',
            'expected_yield' => 'required|numeric',
            'yield_unit' => 'required|in:kg,t',
            'color' => 'required|string|max:7',
            'cultivation_method' => 'required|string',
        ]);

        Cropping::create($validated);


        return redirect()->route('cropping.index')->with('success', '作付が登録されました。');
    }

    public function edit(Cropping $cropping)
    {
        $fields = Field::all();
        $items = Item::all();
        return view('cropping.edit', compact('cropping', 'fields', 'items'));
    }

    public function update(Request $request, Cropping $cropping)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'item_id' => 'required|exists:items,id',
            'field_id' => 'required|exists:fields,id',
            'planting_date' => 'required|date',
            'expected_yield' => 'required|numeric',
            'yield_unit' => 'required|in:kg,t',
            'color' => 'required|string|max:7',
            'cultivation_method' => 'required|string',
        ]);

        $cropping->update($validated);

        return redirect()->route('cropping.index')->with('success', '作付情報が更新されました。');
    }

    public function info(Cropping $cropping)
    {
        // Cropping には item() リレーションが定義済みなので、
        // 品種名は $cropping->item->variety_name から取得
        // 栽培方法は $cropping->cultivation_method
        // 肥料/農薬情報は どこで管理しているかで変わる
    
        return response()->json([
            'variety_name'        => optional($cropping->item)->variety_name,
            'cultivation_method'  => $cropping->cultivation_method,
    
            // 今回は例としてCroppingテーブルの中に fertilizers/pesticides 情報がない想定のため
            // もし croppingsテーブルに fertilizer_info / pesticide_info カラムがあれば取り出す
            'fertilizer_info'     => $cropping->fertilizer_info ?? '', 
            'pesticide_info'      => $cropping->pesticide_info ?? '',
    
            // あるいは中間テーブルで複数の肥料や農薬を紐づけているなら、
            // ここでデータを連結して文字列化するなどの実装を入れてもOK
        ]);
    }
    }
