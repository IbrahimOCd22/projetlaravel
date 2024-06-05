<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;
    public function cv(){
        return $this->belongsTo(CV::class);
    }
    protected $fillable=[
        "expertise",
        "level",
        "c_v_s_id",
       
    ];
    protected $table="expertises";
}
