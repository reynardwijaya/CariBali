<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
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

    public const LOCATIONS = [
        'ubud' => 'Ubud',
        'kuta' => 'Kuta',
        'seminyak' => 'Seminyak',
        'uluwatu' => 'Uluwatu',
        'canggu' => 'Canggu',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}
