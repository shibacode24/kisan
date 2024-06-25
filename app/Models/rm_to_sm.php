<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rm_to_sm extends Model
{
    use HasFactory; 
    protected $table='rm_to_sm';
    protected $fillable=['rm_id','sm_id'];


    public function setsm($value)
    {
        $this->attributes['sm']= json_encode($value);
    }

    public function getasm($value)
    {
        return $this->attributes['sm'] = json_decode($value);
      }
}
