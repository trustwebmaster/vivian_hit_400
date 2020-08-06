<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class public_section extends Model
{
    protected $fillable =[
    	'section',
    	'description',
    	'accessibility'
    ];
}
