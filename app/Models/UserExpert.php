<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExpert extends Model
{
    use HasFactory;


    protected $table = 'user_experts';

    protected $guarded = [];
}
