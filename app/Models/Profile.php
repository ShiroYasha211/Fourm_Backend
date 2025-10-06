<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        "name",
        "user_id",
        "image",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
