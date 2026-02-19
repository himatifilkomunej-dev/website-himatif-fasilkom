<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class IthingsCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ithings_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    /**
     * Relation
     *
     */
    public function products()
    {
        return $this->hasMany(IthingsProduct::class, 'category_id');
    }

    /**
     * custom getter
     *
     * @param property = created_at, update_at, deleted_at
     */
    public function getHumanDate($property)
    {
        $date = $this->$property;
        return Carbon::parse($date)->translatedFormat('d F Y');
    }
}
