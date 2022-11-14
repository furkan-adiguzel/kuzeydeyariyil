<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property integer $u_id
 * @property string $name
 * @property string $mobile
 * @property string $password
 * @property string $role
 * @property \DateTime $mobile_verified_at
 * @property \DateTime $remember_token
 * @property \DateTime $created_at
 * @property \DateTime $deleted_at
 *
 * @property $roles
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';
    const ROLE_USER = 'user';

    public $timestamps = false;
    protected $primaryKey = 'u_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mobile',
        'password',
        'role',
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
        'mobile_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return [
            self::ROLE_ADMIN => 'Super Admin',
            self::ROLE_MANAGER => 'Manager',
            self::ROLE_USER => 'Kullanıcı',
        ];
    }

    public function attender()
    {
        return $this->hasOne(Attender::class, 'user_id', 'u_id');
    }

    public function getFullnameMobileAttribute()
    {
        return $this->name . ' ' . $this->surname . ' | ' . $this->mobile;
    }

    public function getIsAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function getIsManager()
    {
        return $this->role === self::ROLE_MANAGER;
    }

}
