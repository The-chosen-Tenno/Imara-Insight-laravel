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

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function tags()
    {
        return $this->hasManyThrough(Tag::class, ProjectTag::class, 'project_id', 'id', 'id', 'tag_id');
    }

    public function subAssignees()
    {
        return $this->hasManyThrough(User::class, ProjectSubAssignee::class, 'project_id', 'id', 'id', 'user_id')->where('project_sub_assignees.status', 'added');
    }
}