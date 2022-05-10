<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emirtes extends Model
{
    use HasFactory;


    protected $table = 'emirtes';

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'emirate_id');
    }
}
