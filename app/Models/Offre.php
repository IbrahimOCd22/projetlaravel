<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function demendes()
    {
        return $this->hasMany(Demende::class);
    }
    protected $fillable = [
        'poste',
        'salary',
        'description',
        'categorie',
        'message',
        'employer_id',
    ];
    protected $table = "offres";
}
