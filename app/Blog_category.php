<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_category extends Model
{
    public $table='blog_category';
    protected $fillable=['id','blog_id','category_id'];

    public function category(){
        return $this->hasOne('App\Categories','id','category_id')->select(array('id','category_name'));
    }

    public static function insertBlogCategory($param){
        $record=new Blog_category();
        $record->blog_id=$param['blog_id'];
        $record->category_id=$param['category_id'];
        $record->save();
        return true;
    }
}
