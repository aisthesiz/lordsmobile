<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'lord_account_id',
        'params',
        'time_start',
        'time_end',
        'is_active',
        'activated_at',
        'deactivated_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'activated_at' => 'datetime',
        'deactivated_at' => 'datetime',
        'time_start' => 'datetime',
        'time_end' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
