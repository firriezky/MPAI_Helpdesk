<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;
    protected $table = "perizinans";

    protected $fillable = [
        'name',
        'nim',
        'fakultas',
        'class',
        'agenda_id',
        'jurusan',
        'izin_type',
        'account_type',
        'deskripsi',
        'izin_photo',
        'created_at',
        'updated_at',
    ];
}
