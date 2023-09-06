<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    public $table = "berkas";

    protected $fillable = [
        'nama_berkas', 'path_berkas'
    ];
}