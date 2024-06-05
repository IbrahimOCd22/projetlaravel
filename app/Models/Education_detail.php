<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education_detail extends Model
{
    use HasFactory;
    public function cv(){
        return $this->belongsTo(CV::class);
    }
    protected $fillable=[
        "subje",
        "startdate",
        "enddate",
        "description",
        "c_v_s_id",
        "school"
    ];
    protected $table="education_details";
}
