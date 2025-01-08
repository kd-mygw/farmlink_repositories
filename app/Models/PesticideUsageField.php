<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesticideUsageField extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'pesticide_usage_fields';

    // 複数代入を許可するカラム一覧
    protected $fillable = [
        'date',
        'cropping_id',
        'field_id',
        'pesticide_id',
        'dilution',
        'usage_amount',
        'worker_id',
        'equipment_id',
        'memo',
    ];

    // リレーション: 作付
    public function cropping()
    {
        return $this->belongsTo(Cropping::class);
    }

    // リレーション: 圃場
    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    // リレーション: 農薬
    public function pesticide()
    {
        return $this->belongsTo(Pesticide::class);
    }

    // リレーション: 作業員
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    // リレーション: 使用機械
    public function machine()
    {
        return $this->belongsTo(Equipment::class);
    }
}
