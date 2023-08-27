<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'companies';
    protected $fillable = ['name', 'email', 'phone', 'password' ];

    public function getVerified(){
        if($this->verified)
            return 'Verified';
        else
            return 'Unverified';
    }

    public function isFollower(){
        if(Auth::guard('customer')->check()){
            $customerId = Auth::guard('customer')->user()->id;
        }else{
            $customerId = -1;
        }
        $follower = Follower::where('customer_id', $customerId)->where('company_id', $this->id)->first();

        if($follower)
            return true;
        else
            return false;
    }

    public function getFollowers(){
        return Follower::where('company_id', $this->id)->get();
    }
}
