<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $table = "examinations";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'performed_at',
        'diagnosis'      
    ];


    public function doctor(){
        return $this->belongsTo('App\Models\User', 'doctor_id');
    }
    public function patient(){
        return $this->belongsTo('App\Models\Patient', 'patient_id');
    }
}
