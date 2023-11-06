<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accunts extends Model
{
    protected $table = 'accuntmaster';
    protected $fillable = ['name','furigana', 'email'.'tel', 'postalcode','password','prefecture'.'cities', 'address', 'contact_body','id'];
    protected $dates =  ['created_at', 'updated_at'];
}