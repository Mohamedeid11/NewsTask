<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title' , 'subject'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
