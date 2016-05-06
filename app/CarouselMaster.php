<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselMaster extends Model
{
    protected $table = 'carousel_master';

    protected $fillable = ['file_path', 'client_name', 'description', 'text1', 'text2', 'date'];
}
