<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_experience extends Model
{
    use HasFactory;
    public function cv()
    {
        return $this->belongsTo(CV::class);
    }
    protected $fillable=[
        "employer",
        "jobtitre",
        "startdate",
        "enddate",
        "localisation",
        "description",
        "c_v_s_id",
      
    ];
    protected $table="work_experiences";
}
