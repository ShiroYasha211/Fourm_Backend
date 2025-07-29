<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feed extends Model
{
    protected $fillable = [
        "user_id",
        "content",
    ];
    protected $appends = ["Liked"];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
    public function getLikedAttribute(): bool
    {
        return(bool) $this->likes()->where("feed_id", $this->id)->where('user_id',auth()->id())->exists();
    }
     public function comments(): HasMany
    {
        return $this->hasMany(comment::class);
    }

}
