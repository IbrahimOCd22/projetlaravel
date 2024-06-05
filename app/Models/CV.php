<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;
    protected $table = "c_v_s";

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function work_experiences()
    {
        return $this->hasMany(Work_experience::class, 'c_v_s_id'); // Use the correct class name and foreign key
    }

    public function education_details()
    {
        return $this->hasMany(Education_detail::class, 'c_v_s_id'); // Use the correct class name and foreign key
    }

    public function languages()
    {
        return $this->hasMany(Language::class, 'c_v_s_id'); // Use the correct class name and foreign key
    }

    public function expertise()
    {
        return $this->hasMany(Expertise::class, 'c_v_s_id'); // Use the correct class name and foreign key
    }

    protected $fillable = [
        "nom",
        "email",
        "phone",
        "catagorie",
        "adress",
        "photo",
        "profile",
        "candidat_id",
    ];
}
