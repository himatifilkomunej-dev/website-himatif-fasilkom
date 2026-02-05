<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NIMChecker extends Model
{
    use HasFactory;

    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    protected $fillable = [
        'name', 'nim',  'angkatan', 'status',
    ];

    protected $casts = [
        'nim' => 'string',
        'id' => 'string',
        'angkatan' => 'string',
    ];

}
