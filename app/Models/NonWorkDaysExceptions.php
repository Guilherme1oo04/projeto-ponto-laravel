<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonWorkDaysExceptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'day',
        'reason',
        'timeline_name'
    ];
}
