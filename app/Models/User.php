<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasRolesAndPermissions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndPermissions, SoftDeletes;

    const GENDER_M = 1;
    const GENDER_W = 2;
    const GENDER_N = 0;

    const STATUS_LOCK   = 0;
    const STATUS_UNLOCK = 1;
    const STATUS_TRASH  = 3;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fio',
        'db_day',
        'db_month',
        'db_year',
        'gender',
        'shop',
        'phone',
        'email',
        'password',
        'status',
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
    ];

    static function getGenders()
    {
        return [
            self::GENDER_N => "Неизвестен",
            self::GENDER_M => "Мужской",
            self::GENDER_W => "Женский",
        ];
    }

    public function getGenderTitleAttribute()
    {
        return self::getGenders()[$this->gender??0];
    }

    static function getStatus()
    {
        return [
            self::STATUS_LOCK   => "Заблокирован",
            self::STATUS_UNLOCK => "Активен",
            self::STATUS_TRASH  => "Удален",
        ];
    }

    public function getStatusTitleAttribute()
    {
        return self::getStatus()[$this->status];
    }
}
