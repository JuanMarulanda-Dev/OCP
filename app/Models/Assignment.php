<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public $timestamps = false;

    
    protected $casts = [
        'project_id' => 'string',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class); // Un Asignación tiene un proyecto
    }

}
