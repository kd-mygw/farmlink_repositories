<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FertilizerUsageSeed extends Model
{
    use HasFactory;

    //
    protected $table = 'records_fertilizers_seeds';
    //
    protected $fillable = [
        'date',
        'cropping_id',
        'seed_id',
        'fertilizer_id',
        'usage_amount',
        'unit',
        'worker_id',
        'equipment_id',
        'memo',
    ];

    // 作付
    public function cropping()
    {
        return $this->belongsTo(Cropping::class);
    }

    // 種苗
    public function seed()
    {
        return $this->belongsTo(Seed::class);
    }

    // 肥料
    public function fertilizer()
    {
        return $this->belongsTo(Fertilizer::class);
    }

    // 作業員
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    // 使用機械
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
