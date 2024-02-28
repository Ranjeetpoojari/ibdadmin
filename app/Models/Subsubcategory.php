<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    protected $fillable = [
        'id',
        'subcategory_id',
        'name',
        'slug',
        'is_active',
        'created_at',
        'updated_at',

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $table ='subsubcatory';
}
