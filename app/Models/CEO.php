<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CEO extends Model
{
    use HasFactory;
    protected $table="CEO";
    protected $filllable=[
        'Name',
        'Mobile_Number',
        'Username',
        'Password',

    ];
}
