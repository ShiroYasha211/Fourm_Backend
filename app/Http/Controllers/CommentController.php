<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $feed_id)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);
try {
        $comment = Comment::create([
            "user_id" => auth()->id(),
            "feed_id" => $feed_id,
            "body" => $request->body,
            "parent_id" => $request->parent_id,
        ]);


        $comment->load(['user', 'replies.user'])
                ->loadCount(['replies as replies_count', 'likes as likes_count'])
                ->loadExists(['likes as is_liked' => function($q) {
                    $q->where('user_id', auth()->id());
                }]);

        return response()->json([

           'comment' => $comment,
            'message' => 'Comment added successfully'
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Server Error',
            'details' => $e->getMessage()
        ], 500);
    }
}

    public function replies(Comment $comment)
    {
         $replies = $comment->replies()
        ->with(['user'])
        ->withCount(['replies as replies_count', 'likes as likes_count'])
        ->withExists(['likes as is_liked' => function($q) {
            $q->where('user_id', auth()->id());
        }])
        ->latest()
        ->get();

    return response()->json([
        'replies' => $replies,
        'count' => $replies->count()
    ], 200);
    }

    public function getComments($feed_id)
    {
       $comments = Comment::with(['user', 'replies.user'])
        ->withCount(['replies as replies_count', 'likes as likes_count'])
        ->withExists(['likes as is_liked' => function($q) {
            $q->where('user_id', auth()->id());
        }])
        ->whereNull('parent_id')
        ->whereFeedId($feed_id)
        ->latest()
        ->get();

    return response()->json([
        'comments' => $comments,
        'count' => $comments->count()
    ], 200);
    }
     public function toggleLike($comment_id)
    {
        $user = auth()->user();
        $comment = Comment::findOrFail($comment_id);
        
        $existingLike = $comment->likes()->where('user_id', $user->id)->first();
        
        if ($existingLike) {
            $comment->likes()->detach($user->id);
            $isLiked = false;
        } else {
            $comment->likes()->attach($user->id);
            $isLiked = true;
        }
        
        $comment->loadCount('likes')
                ->loadExists(['likes' => function($q) use ($user) {
                    $q->where('user_id', $user->id);
                }]);
        
        return response()->json([
            'likes_count' => $comment->likes_count,
            'is_liked' => $isLiked,
            'message' => $isLiked ? 'Comment liked' : 'Like removed'
        ], 200);
    }
    
    public function getLikers($comment_id)
    {
        $likers = Comment::findOrFail($comment_id)
                        ->likes()
                        ->select('users.id', 'users.name', 'users.profile_image')
                        ->get();
        
        return response()->json(['likers' => $likers], 200);
    }
}