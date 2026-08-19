<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsCendol extends Model
{
    use HasFactory;

    protected $table = 'es_cendol';

    protected $fillable = [
        'nama',
        'rasa',
        'harga',
        'stok',
    ];
}
