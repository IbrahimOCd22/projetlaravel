<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public function cv(){
        return $this->belongsTo(CV::class);
    }
    protected $fillable=[
        "languages",
        "level",
        "c_v_s_id",
       
    ];
    protected $table="languages";
}
