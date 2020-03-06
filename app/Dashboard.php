<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'applications';
    protected $fillable = ['category_id','name','file','logo'];
}
