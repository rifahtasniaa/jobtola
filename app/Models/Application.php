<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    public function getCustomer(){
        return Customer::find($this->customer_id);
    }
    public function getJob(){
        return Job::find($this->job_id);
    }
}
