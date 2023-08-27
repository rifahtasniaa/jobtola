<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function posts(){
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('frontend.pages.feed', ['posts' => $posts]);
    }

    public function myPosts(){
        $posts = Post::where('customer_id', Auth::guard('customer')->user()->id)->orderBy('id', 'desc')->paginate(5);

        return view('frontend.pages.my-posts', ['posts' => $posts]);
    }

    public function newPost(Request $request){
        $newPost = new Post();
        $newPost->setAttribute('body', $request->get('body'));
        $newPost->setAttribute('customer_id', Auth::guard('customer')->user()->id);
        $newPost->save();

        return redirect()->route('feed');
    }

    public function comments(Request $request){
        return view('frontend.pages.post-details', ['post' => Post::find($request->get('id'))]);
    }

    public function newComment(Request $request){
        $newComment = new Comment();
        $post = Post::find($request->get('post-id'));
        $newComment->setAttribute('body', $request->get('body'));
        $newComment->setAttribute('post_id', $post->id);
        $newComment->setAttribute('customer_id', Auth::guard('customer')->user()->id);
        $newComment->save();

        if($newComment->customer_id != $post->customer_id){
            Notification::createPostNotification(
                $post->customer_id,
                $post->id,
                (Customer::find($newComment->customer_id)->getName() . ' commented on your post "' . substr($post->body, 0, 20) . '..."')
            );
        }
        return redirect()->route('post.detail', ['id' => $post->id]);
    }

    public function toggleUpvote(){
        $customerId = Auth::guard('customer')->user()->id;
        $postId = request()->get('post-id');

        $vote = Vote::where('customer_id', $customerId)->where('post_id', $postId)->where('up', true)->first();
        if($vote){
            $vote->delete();
        }else{
            $vote = new Vote();
            $vote->setAttribute('up', true);
            $vote->setAttribute('customer_id', $customerId);
            $vote->setAttribute('post_id', $postId);
            $vote->save();
        }
        return redirect()->route('post.detail', ['id' => $postId]);
    }
}
