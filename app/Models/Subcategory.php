<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  protected $fillable =[
    'id',
    'category_id',
    'name',
    'slug',
    'is_active',
    'created_at',
    'updated_at',
  ];
  protected $hidden =[
    'created_at',
    'updated_at',
  ];
  protected $table ='subcategory';
}
