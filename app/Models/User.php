<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'fname', 'lname', 'tel', 'email', 'address', 'password', 'slug',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class)->orderBy('created_at', 'desc');
    }

    public function fullName()
    {
        return $this->fname.' '.$this->lname;
    }

    protected function address(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => is_null($value) ? __('app.model.address') : $value,
            set: fn (string $value) => empty($value) ? 'not defined' : $value,
        );
    }

    public function userGravatar()
    {
        return 'https://www.gravatar.com/avatar/'.md5(trim($this->email));
    }
}
