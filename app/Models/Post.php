<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'rating',
        'category',
        'location',
        'image',
        'maps_link'
    ];

    public const CATEGORIES = [
        'culture' => ['label' => 'Culture & Temple', 'emoji' => '🏛️'],
        'nature' => ['label' => 'Nature', 'emoji' => '🌾'],
        'adventure' => ['label' => 'Adventure', 'emoji' => '🌋'],
        'wildlife' => ['label' => 'Wildlife', 'emoji' => '🐒'],
        'beach' => ['label' => 'Beach', 'emoji' => '🏖️'],
        'wellness' => ['label' => 'Wellness', 'emoji' => '🧘'],
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    /**
     * All distinct location tags currently in use, for the search dropdown
     * and admin autocomplete. Locations are free-text, not a fixed list.
     */
    public static function distinctLocations()
    {
        return static::whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');
    }
}
