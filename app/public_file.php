<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class public_file extends Model
{
    protected $fillable = [
    	'file',
    	'path',
    	'size',
    	'format',
    	'uploaded_by'
    ];
}
