<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Foundation\Auth\User as Authenticatable;


// Admin
class Admin extends AuthUser
{
    use HasFactory, Notifiable;

    protected $table = 'admin';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
           ->format('d, M Y H:i');
    }
    public function getUpdatedAtAttribute()
    {
    return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->diffForHumans();
    }


    public function adminlte_desc()
{
    return 'Selamat Datang !';
}

public function adminlte_profile_url()
{
    return 'profile';
}
public function adminlte_image()
{
    return 'https://i.postimg.cc/1zMnMc8x/admin-image.png';
}

}

