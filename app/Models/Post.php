<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function getComments(){
        return Comment::where('post_id', $this->id)->orderBy('created_at', 'desc')->get();
    }

    public function getCommentCount(){
        return Comment::where('post_id', $this->id)->get()->count();
    }

    public function getOwner(){
        return Customer::find($this->customer_id);
    }

    public function getUpvoteCount(){
        return Vote::where('post_id', $this->id)->where('up', true)->get()->count();
    }

    public function hasUpvote(){
        if(Auth::guard('customer')->check()){
            $customerId = Auth::guard('customer')->user()->id;
        }else{
            $customerId = -1;
        }
        $vote = Vote::where('customer_id', $customerId)->where('post_id', $this->id)->where('up', true)->first();

        if($vote)
            return true;
        else
            return false;
    }
}
