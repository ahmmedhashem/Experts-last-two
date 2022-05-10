<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $guarded = [];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
