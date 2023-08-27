<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follower extends Model
{
    use HasFactory;
    protected $table = 'followers';
    protected $fillable = ['company_id', 'customer_id'];

    public function getCustomer(){
        return Customer::find($this->customer_id);
    }
    public function getCompany(){
        return Job::find($this->company_id);
    }
}
