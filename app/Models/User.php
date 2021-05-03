<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "doctors";
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'username',
        'confirm_password',       
    ];
    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function doc_type(){
        return $this->belongsTo('App\Models\DocType', 'doc_types_id');
    }
    public function examinations(){
        return $this->hasMany('App\Models\Examination');
    }
}
