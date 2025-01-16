<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Memo extends Model
{
    use HasFactory;

    // テ－ブル名
    protected $table = 'memo';

    // 
    protected $fillable = [
        'date',
        'worker_id',
        'memo',
    ];

    // リレーション：作業員
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
