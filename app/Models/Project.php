<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'project_name',
        'description',
        'project_type',
        'status'
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}