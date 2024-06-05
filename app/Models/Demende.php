<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demende extends Model
{
    use HasFactory;
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
    protected $fillable = [
        "reponse",
        "offre_id",
        "candidat_id",

    ];
    protected $table = "demendes";
}
