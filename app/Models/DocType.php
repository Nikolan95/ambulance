<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocType extends Model
{
    use HasFactory;

    protected $table = "doc_types";
    protected $fillable = [
        'id',
        'type',
        
    ];
    public function users(){
    	return $this->hasMany('App\Models\User');
    }
}
