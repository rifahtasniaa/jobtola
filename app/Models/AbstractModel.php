<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Schema;

class AbstractModel extends Model
{
    use HasFactory;
    protected $table = '';
}
