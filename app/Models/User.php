<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nim','email', 'password', 'role_id', 'instagram', 'linkedin', 'periode', 'periode_1', 'periode_2', 'periode_3'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'password' => 'hashed',
        'email_verified_at' => 'datetime',
        'periode' => 'json', // Cast periode attribute to array
        'periode_1' => 'json',
        'periode_2' => 'json',
        'periode_3' => 'json',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
