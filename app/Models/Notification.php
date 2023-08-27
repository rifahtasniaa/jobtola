<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = ['job_id', 'post_id', 'customer_id', 'type', 'body'];

    public static function getNotifications(){
        return Notification::where('customer_id', Auth::guard('customer')->user()->id)->orderBy('id', 'desc')->get();
    }

    public static function createPostNotification($customerId, $postId, $body){
        Notification::create([
            'type' => 0,
            'customer_id' => $customerId,
            'post_id' => $postId,
            'body' => $body
        ]);
    }
    public static function createJobNotification($customerId, $jobId, $body){
        Notification::create([
            'type' => 1,
            'customer_id' => $customerId,
            'job_id' => $jobId,
            'body' => $body
        ]);
    }
}
