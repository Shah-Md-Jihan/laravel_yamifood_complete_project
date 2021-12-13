<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['menu_thumbnail','menu_name','menu_details','menu_price','menu_category_id'];

    function RelationWithMenuCategories(){
      return $this->belongsTo(MenuCategory::class, 'menu_category_id', 'id');
    }
}
