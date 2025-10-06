<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feed extends Model
{
    protected $fillable = [
        "user_id",
        "content",
    ];

    protected $appends = [
         
        'likes_count', 
        'is_liked',
        'comment_count'
    ];

    protected $withCount = [
        'comments',
        'likes'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Deleted User',
            'profile_image' => null
        ]);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'feed_likes', 'feed_id', 'user_id');
            
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'feed_likes')
            ->select(['users.id', 'users.name', 'users.profile_image'])
            ->orderBy('feed_likes.created_at', 'desc');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)
            ->whereNull('parent_id');
    }

    

    // Attributes
    public function getCommentCountAttribute()
    {
        return $this->comments_count ?? 0;
    }

    public function getLikesCountAttribute()
    {
        return $this->attributes['likes_count'] ?? 0;
    }

    public function getIsLikedAttribute()
    {
        if (!auth()->check()) {
            return false;
        }

        return $this->likes()
            ->where('user_id', auth()->id())
            ->exists();
    }

    public function getRepliesCountAttribute()
    {
        return $this->allComments()
            ->whereNotNull('parent_id')
            ->count();
    }
}