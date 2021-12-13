<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['menu_category_name'];

    function menuproducts(){
      return $this->hasMany(MenuProduct::class);
    }
}
