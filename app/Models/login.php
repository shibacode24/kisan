<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\logincontroller;

class login extends Model
{
    use HasFactory;

    protected $table="login";
    protected $filllable=['email','password'];
}
