<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesBuyGuidesMain extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','number','guides_image','area_details','sale_buy'
    ];
}
