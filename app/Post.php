<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = ['title', 'body' ,'image_url' ,'price'];


       public function user() {
         return $this->belongsTo('App\User');
       }


       public function cartposts() {
         return $this->hasMany('App\CartPost');
       }


}
