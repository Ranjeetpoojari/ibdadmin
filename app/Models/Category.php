<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = [
    'id',
    'name',
    'slug',
    'is_active',
    'created_at',
    'updateted',
   ];
   protected $hidden = [
    'created_at',
    'updateted',
   ];
   protected $table = 'category';
}
