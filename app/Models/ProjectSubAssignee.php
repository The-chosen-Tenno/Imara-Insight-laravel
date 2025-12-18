<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSubAssignee extends Model
{
    protected $fillable = [
        'project_id',
        'sub_assignee_id',
    ];
    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
