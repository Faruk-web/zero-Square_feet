<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyByClient extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','phone','email'
    ];
}
