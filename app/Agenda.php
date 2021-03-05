<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = "agendas";

    protected $fillable = [
        'judul',
        'tipe',
        'status',
        'tanggal_akhir',
        'materi',
        'tempat',
    ];
   
}
