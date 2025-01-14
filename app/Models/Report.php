<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    
    // テーブル名
    protected $table = 'report';

    // 
    protected $fillable = [
        'date',
        'worker_id',
        'start_time',
        'end_time',
        'task_name',
        'memo',
    ];

    // リレーション：作業員
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
    // リレーション：作業内容
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
