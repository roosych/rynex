<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    protected $fillable = ['code', 'neighborhood', 'is_active', 'sort_order'];

    protected $casts = ['is_active' => 'boolean'];
}
