<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $connection = 'central';
    protected $table = 'tokos';
    protected $fillable = ['nama_toko', 'engine_db', 'nama_database', 'host', 'port', 'status'];
}
