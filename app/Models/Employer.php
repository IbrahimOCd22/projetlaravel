<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    public function offres(){
        return $this->hasMany(Offre::class);
    }
    protected $fillable=[
        "name",
        "email",
        "password",
        "photo",
    ];
    protected $table="employers";
}
