<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'emirate_id',
        'nationality_id',
        'category_id',
        'type',
        'gender',
        'date_of_birth',
        'phone',
        'name',
        'email',
        'password',
        'alt_phone',
        'current_location',
        'institution',
        'willing_to_study',
        'willing_to_consultancy',
        'available_to_request',
        'created_at',
        'updated_at',
        'langauges',
        'categories',


    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at','updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function emirtes()
    {
        return $this->belongsTo(Emirtes::class, 'emirate_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Country::class, 'nationality_id');
    }


    public function langauges()
    {
        return $this->belongsToMany(Langauge::class, 'user_langauges','user_id','langauge_id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_experts','user_id','category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orginizations()
    {
        return $this->hasMany(Orginization::class, 'user_id');
    }

    public function consultancies()
    {
        return $this->hasMany(Consultancie::class, 'user_id');
    }

    public function publications()
    {
        return $this->hasMany(Publication::class, 'user_id');
    }

    public function committes()
    {
        return $this->hasMany(Committe::class, 'user_id');
    }
}
