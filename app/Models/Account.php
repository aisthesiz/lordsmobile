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
        'name',
        'user_id',
        'lord_account_id',
        'params',
        'time_start',
        'time_end',
        'params_updated_at',
        'params_readed_at',
        'is_active',
        'activated_at',
        'deactivated_at',
    ];

    protected $casts = [
        'is_active'         => 'boolean',
        'activated_at'      => 'datetime',
        'deactivated_at'    => 'datetime',
        'params_updated_at' => 'datetime',
        'params_readed_at'  => 'datetime',
        'time_start'        => 'datetime',
        'time_end'          => 'datetime',
        'params'            => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function is_active(): bool
    {
        if($this->time_end < now()) {
            if ($this->is_active) {
                $this->deactivate();
            }
            return false;
        }

        return $this->is_active;
    }

    public function deactivate(): void
    {
        $this->deactivated_at = now();
        $this->is_active = false;
        $this->save();
    }

    public function activate(): void
    {
        $this->deactivated_at = null;
        $this->activated_at = now();
        $this->is_active = true;
        $this->save();
    }

    public function compareArrays($array1, $array2, $path = '') {
        foreach ($array1 as $key => $value1) {
            if (isset($array2[$key])) {
                if (is_array($value1) && is_array($array2[$key])) {
                    $this->compareArrays($value1, $array2[$key], $path . '/' . $key);
                } elseif ($value1 !== $array2[$key]) {
                    echo "Difference found at path: $path/$key\n";
                }
            } else {
                echo "Key '$key' not found in the second array.\n";
            }
        }
    
        foreach ($array2 as $key => $value2) {
            if (!isset($array1[$key])) {
                echo "Key '$key' not found in the first array.\n";
            }
        }
    }
}
