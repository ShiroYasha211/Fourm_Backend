<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = [
        "user_id","feed_id","body", "parent_id",
    ];
        protected $appends = ['replies_count', 'likes_count', 'is_liked'];

   

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function feed(): BelongsTo
    {
        return $this->belongsTo(Feed::class);
    }
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'comment_likes', 'comment_id', 'user_id')->withTimestamps();
    }
     public function getRepliesCountAttribute()
    {
        return $this->attributes['replies_count'] ?? 0;
    }

    public function getLikesCountAttribute()
    {
        return $this->attributes['likes_count'] ?? 0;
    }

    public function getIsLikedAttribute()
    {
        return $this->attributes['is_liked'] ?? false;
    }
}
