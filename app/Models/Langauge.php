<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langauge extends Model
{
    use HasFactory;


    protected $table = 'langauges';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_langauges','langauge_id','user_id');
    }
}
