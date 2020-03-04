<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    protected $fillable = ['category_id','name','file','logo'];
    public function viewcategory()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}