<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSell extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'might',
        'stats_sword',
        'stats_bow',
        'stats_horse',
        'heroes_payed',
        'heroes_free',
        'artifacts',
        'skins',
        'troops',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
        'description',
        'is_verified',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
    ];
}
