<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'standard_non_work_days',
        'minimum_week_hours'
    ];
}
