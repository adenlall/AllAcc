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


class Service extends Model
{
    use HasFactory, LogsActivity;

    protected $table = "user_services";
    protected $primaryKey = 'username';
    protected $fillable = [
        'id',
        'username',
        'instagram',
        'facebook',
        'telegram',
        'twitter',
        'deviantArt',
        'devto',
        'youtube',
        'pinterest',
        'github',
        'whatsapp',
        'vk',
    ];

    protected static $logName = 'users_services';


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['instagram', 'facebook', 'telegram', 'twitter', 'deviantArt', 'devto', 'youtube', 'pinterest', 'github', 'whatsapp', 'vk'])
        ->setDescriptionForEvent(fn(string $eventName) => "Services has been {$eventName} by => :causer.id")
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
