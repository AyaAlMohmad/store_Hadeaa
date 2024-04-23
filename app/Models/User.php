<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'phone',
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
    ];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }
    public function hasRole($role)
    {
        return $this->roles()->whereIn('role_name', $role)->exists();
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'orders');
    }
    public function additions()
    {
        return $this->belongsToMany(Addition::class,'order_additions');
    }
    public function productsFavorit()
    {
        return $this->belongsToMany(Product::class,'favorites');
    }
}
