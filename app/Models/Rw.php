<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    protected $table = "rws";
    protected $fillable = ['no_rw','id_kelurahan'];
    public $timestamps = true;

    public function kelurahan()
    {
        return $this->belongsTo('App\Models\Kelurahan','id_kelurahan');
    }

    public function virus()
    {
        return $this->hasMany('App/Models/Virus','id_rw');
    }
}
