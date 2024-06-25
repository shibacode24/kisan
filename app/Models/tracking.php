<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracking extends Model
{
    use HasFactory;
    protected $table="tracking";
    protected $fillable=[
    'user_id',
	'role',
    'latitude',
    'longitude'
];

public function total_kilometer()
{
    return $this->hasOne(save_totalkilometer::class, 'user_id', 'user_id');
}

}
