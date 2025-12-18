<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    protected $fillable = [
        'project_id',
        'tag_id'
    ];
    use HasFactory;

    public function project()
    {
        $this->belongsTo(Project::class);
    }

    public function tag()
    {
        $this->belongsTo(Tag::class);
    }
}

