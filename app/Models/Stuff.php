<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    use HasFactory;
    protected $fillable = ['stuff_image','name_of_stuff','position_of_stuff','stuff_fb_link','stuff_twitter_link','stuff_google_plus_link'];
}
