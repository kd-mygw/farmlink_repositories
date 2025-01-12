<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesticideUsageSeed extends Model
{
    use HasFactory;

    protected $table = 'pesticide_usage_seeds';

    protected $fillable = [
        'date',
        'cropping_id',
        'seed_id',
        'pesticide_id',
        'dilution',
        'usage_amount',
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

    // 農薬
    public function pesticide()
    {
        return $this->belongsTo(Pesticide::class);
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
