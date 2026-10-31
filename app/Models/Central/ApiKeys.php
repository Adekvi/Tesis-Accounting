<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Model;

class ApiKeys extends Model
{
    protected $connection = 'central';
    protected $table = 'api_keys';
}
