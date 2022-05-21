<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'username',
        'email',

        'name',
        'age',
        'gender',
        'birthday',
        'country',
        'address',

        'quote',
        'artist',
        'track',
        'anime_1',
        'anime_2',
        'anime_c',

        'visit',

        'password',
        'anilist_id',
        'google_id',
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
    protected static $logName = 'users_info';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'username', 'password', 'email'])
        ->dontLogIfAttributesChangedOnly(['name'])
        ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName} by => :causer.id with username @:properties.username ")
        ->logOnlyDirty();
    }
}
