<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaGuidesMain extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','image'
    ];
}
