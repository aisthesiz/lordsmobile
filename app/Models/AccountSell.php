<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSell extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        "id",
        "title",
        "might",
        "stats_bow",
        "stats_horse",
        "stats_sword",
        "heroes_payed",
        "artifacts",
        "skins",
        "troops",
        "value_sell",
        "value_discount",
        "value_sold",
        "value_fee",
        "elite_store",
        "is_verified",
        "is_active",
        "description",
        "image_1",
        "image_2",
        "image_3",
        "image_4",
        "image_5",
        "image_6",
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
        'elite_store' => 'boolean',
    ];
}
