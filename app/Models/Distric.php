<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distric extends Model
{
    use HasFactory;

    protected $table="distric";
    protected $filllable=[
        'state_id',
        'District'
    ];
}
