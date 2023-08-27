<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends AbstractModel implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'customers';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'password', 'cv'];

    public function getName(){
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getGender(){
        if($this->gender == 0)
            return 'male';
        elseif ($this->gender == 1)
            return 'female';
        else
            return 'unknown';
    }

    public function getVerified(){
        if($this->verified)
            return 'Verified';
        else
            return 'Unverified';
    }

    public function getGenderOptions(){
        return [
            '0' => 'Male',
            '1' => 'Female',
            '2' => 'Unknown'
        ];
    }
}
