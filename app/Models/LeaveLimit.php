<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveLimit extends Model
{
    protected $fillable = [
        'user_id',

        'annual_balance',
        'annual_extra',
        'annual_status',

        'casual_balance',
        'casual_extra',
        'casual_status',

        'medical_balance',
        'medical_extra',
        'medical_status',

        'half_day_count',
        'annual_half_day_count',
        'casual_half_day_count',
        'medical_half_day_count',

        'total_short_leave',
    ];
    use HasFactory;
}
