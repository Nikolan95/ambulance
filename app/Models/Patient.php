<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patients";
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'jmbg',
        'note',       
    ];
    protected $primaryKey = 'id';

    public function location(){
        return $this->belongsTo('App\Models\Location', 'location_id');
    }
}
