<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index()
    {
        $feeds = Feed::with(['user', 'likes'])
            ->withCount(['comments', 'likes'])
            ->latest()
            ->get()
            ->map(function ($feed) {
                $feed->is_liked = $feed->likes->contains('id', Auth::id());
                return $feed;
            });

        return response([
            "feeds" => $feeds
        ], 200);
    }

    public function store(PostRequest $request)
    {
        $request->validated();

        $feed = auth()->user()->feeds()->create([
            'content' => $request->content,
        ]);

        return response([
            'message' => 'Post created successfully',
            'feed' => $feed
        ], 201);
    }

    public function toggleLike($feed_id)
    {
        $feed = Feed::findOrFail($feed_id);
        $user = auth()->user();

        $feed->likes()->toggle($user->id);

        return response([
            'message' => $feed->likes()->where('user_id', $user->id)->exists() ? 'Liked' : 'Unliked',
            'likes_count' => $feed->likes()->count(),
            'is_liked' => $feed->likes()->where('user_id', $user->id)->exists()
        ], 200);
    }

    public function comment(Request $request, $feed_id)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = Comment::create([
            "user_id" => auth()->id(),
            "feed_id" => $feed_id,
            "body" => $request->body,
            "parent_id" => $request->parent_id,
        ]);

        $comment->load(['user', 'replies.user'])
            ->loadCount(['replies', 'likes'])
            ->loadExists(['likes' => function($q) {
                $q->where('user_id', auth()->id());
            }]);

        return response()->json([
            'comment' => $comment,
            'message' => 'Comment added successfully'
        ], 201);
    }

    public function getComments($feed_id)
    {
        $comments = Comment::with(['user', 'replies.user'])
            ->withCount(['replies', 'likes'])
            ->withExists(['likes' => function($q) {
                $q->where('user_id', auth()->id());
            }])
            ->whereNull('parent_id')
            ->whereFeedId($feed_id)
            ->latest()
            ->get();

        return response([
            "comments" => $comments,
            "count" => $comments->count()
        ], 200);
    }

    public function getLikers($feed_id)
    {
        $likers = Feed::findOrFail($feed_id)
            ->likes()
            ->select(['users.id', 'users.name', 'users.profile_image'])
            ->orderBy('feed_likes.created_at', 'desc')
            ->paginate(10);

        return response([
            "likers" => $likers,
            "count" => $likers->total()
        ], 200);
    }

    public function destroy($id){
        $post = Feed::findOrFail($id);

        if(Auth::id() == $post->user_id)
        {
            $post->delete();
            return response()->json([
                'message' => 'Post Deleted Successfully'
            ],200);
        }
        if(Auth::id() !== $post->user_id)
        {
            return response()->json([
                'message' => 'You Cant delete this post'
            ]);
        }
    }
}