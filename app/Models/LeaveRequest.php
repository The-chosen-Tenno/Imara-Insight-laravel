<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $filable = [
        'user_id',
        'reason_type',
        'leave_note',
        'leave_duration',
        'half_day',
        'start_date',
        'end_date',
        'status',
    ];
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
