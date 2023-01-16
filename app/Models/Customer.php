<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    protected $guarded = [];
    use HasApiTokens, HasFactory, Notifiable;
    public function getDeviceToken()
    {
        return $this->morphMany(DeviceToken::class, 'userable');
    }
}
