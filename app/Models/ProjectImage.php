<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable = [
        'project_id',
        'image',
        'title',
        'description',
        'file_path'
    ];
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
