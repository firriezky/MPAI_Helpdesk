<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nim',
        'fakultas',
        'class',
        'agenda_id',
        'jurusan',
        'account_type',
        'feedback',
        'photo',
        'created_at',
        'updated_at',
    ];
}
