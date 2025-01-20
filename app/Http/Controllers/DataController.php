<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cropping;
use App\Models\HarvestBatch;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $selectedCroppingId = $request->input('cropping_id');
    
        // 作付け一覧などは省略（ドロップダウンに使用する想定）
        $croppings = Cropping::all();
    
        $chartLabels = [];
        $chartDataQuantity   = []; // 毎日の収穫量
        $chartDataRate = []; // 累計収穫率
    
        if ($selectedCroppingId) {
            // 大勝の作付け取得
            $cropping = Cropping::find($selectedCroppingId);

            // (1) 日付ごとの収穫量を合計
            $harvestsByDate = DB::table('harvest_batches')
                ->join('harvests', 'harvest_batches.harvest_id', '=', 'harvests.id')
                ->where('harvests.cropping_id', $selectedCroppingId)
                ->select(
                    DB::raw("DATE(harvests.harvest_date) as date"),
                    DB::raw("SUM(harvest_batches.quantity) as total_quantity")
                )
                ->groupBy(DB::raw("DATE(harvests.harvest_date)"))
                ->orderBy(DB::raw("DATE(harvests.harvest_date)"), 'ASC')
                ->get();
            
            // (2) 日別の合計をもとに「日付」「収穫量」「累計収穫率」を計算
            $runnningTotal = 0; // 累計収穫量
            foreach ($harvestsByDate as $row) {
                $chartLabels[] = $row->date;                // x軸: 日付
                $chartDataQuantity[]   = (float)$row->total_quantity; // y軸: その日の合計収穫量

                // 累計収穫量を加算
                $runnningTotal += $row->total_quantity;

                // 期待収穫量が > 0 なら収穫率を計算
                if ($cropping && $cropping->expected_yield > 0) {
                    $rate = ($runnningTotal / $cropping->expected_yield) * 100;
                } else {
                    $rate = 0;
                }
                $chartDataRate[] = round($rate,1); // 累計収穫率
            }
        }
    
        return view('data.index', [
            'croppings'          => $croppings,
            'selectedCroppingId' => $selectedCroppingId,
            'chartLabels'        => $chartLabels,    // 日付
            'chartDataQuantity'  => $chartDataQuantity, // 日別収穫量
            'chartDataRate'      => $chartDataRate,     // 累計収穫率
        ]);
    }
}
