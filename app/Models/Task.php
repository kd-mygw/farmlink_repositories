<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'crop_name',
        'task_name',
    ];


    public function report()
    {
        return $this->hasMany(Report::class, 'task_id');
    }
}
