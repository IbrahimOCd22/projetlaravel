<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    public function demandes(){
        return $this->hasMany(Demende::class);
    }
    public function cv(){
        return $this->hasOne(CV::class);
    }
    protected $fillable=[
        "name",
        "email",
        "password",
    ];
    protected $table="candidats";

}
