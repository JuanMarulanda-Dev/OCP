<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'first_date',
        'last_date',
        'project_type_id',
        'project_status_id',
        'progress',
        'description'
    ];

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function project_status()
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, 
                                    Assignment::class,
                                    'project_id',
                                    'id','id',
                                    'user_id'); // Un proyecto tiene muchos usuarios a travez de assignment
    }
}
