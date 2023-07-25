<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Core\Services\AreaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'cellphone',
        'is_admin',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function adminlte_image()
    {
        return url('assets/images/user_icon.svg');
    }

    public function adminlte_desc()
    {
        return $this->cellphone;
    }

    public function adminlte_profile_url()
    {
        if (AreaService::isAdmin()) {
            return route('admin.users.edit', auth()->user());
        }
        return route('bot.profile');
    }
}
