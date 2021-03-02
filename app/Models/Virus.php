<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Virus extends Model
{
    use HasFactory;
    protected $table = "viruses";
    protected $fillable = ['id_rw','reaktif','positif','sembuh','meninggal','tanggal'];
    public $timestamps = true;

    public function rw()
    {
        return $this->BelongsTo('App\Models\Rw','id_rw');
    }
}
