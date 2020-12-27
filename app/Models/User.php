<?php

namespace App\Models;

use App\Traits\EncryptationId;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, EncryptationId;

    protected $appends = ['encid'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'company',
        'profession',
        'email',
        'phone',
        'user_rol_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_rol()
    {
        return $this->belongsTo(User_rol::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function projects()
    {
        return $this->hasManyThrough(Project::class, 
                                    Assignment::class,
                                    'user_id',
                                    'id','id',
                                    'project_id'); // Un usuario tiene muchos proyectos a travez de assignment
    }
}
