<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['status','content', 'remarks'.'tel', 'company','name','gender'.'email', 'birth_date', 'occupation','id'];
    protected $dates =  ['created_at', 'updated_at'];
}
