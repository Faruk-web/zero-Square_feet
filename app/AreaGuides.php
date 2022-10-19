<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaGuides extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','main_area_id','area_details','area_image','features_image'
    ];
}
