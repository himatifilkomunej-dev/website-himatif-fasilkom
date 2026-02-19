<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class IthingsProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ithings_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'photo', 'price', 'size', 'description', 'category_id', 'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
        'price' => 'decimal:2',
    ];

    /**
     * Relation
     *
     */
    public function category()
    {
        return $this->belongsTo(IthingsCategory::class, 'category_id');
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

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
