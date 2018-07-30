<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    public $table='blogs';
    protected $fillable=['user_id','blog_title','blog_image','blog_content','blog_author'];

    public function blog_category(){
        return $this->hasMany('App\Blog_category','blog_id')->select(array('id','blog_id','category_id'))->with('category');
    }

    public function category(){
        return $this->hasOne('App\Categories','id','category_id')->select(array('id','category_name'));
    }
    public static function fetchBlogs($param){
        //dd($param);
        $record=self::where('user_id',$param['user_id'])->with('blog_category');
        if(isset($param['dropdownsection']['dropdownFilter'])){
            $dropdown=$param['dropdownsection']['dropdownFilter'];
            $record=$record->whereHas('blog_category',function($query) use($dropdown){
                $query->whereIn('category_id',$dropdown['key']);
            });
        }
        if(isset($param['datesection']['dateFilter'])){
            $datesection=$param['datesection']['dateFilter'];
            $exp=explode('-',$datesection['key']);
            $from=date('Y-m-d',strtotime($exp[0]));
            $to=date('Y-m-d',strtotime($exp[1]));
            $record =$record->whereBetween('created_at',array($from,$to));
        }
        $record=$record->get()->toArray();

        foreach ($record as $k => $mainrec) {
            if (isset($mainrec['blog_category']) && $mainrec['blog_category'] != null) {
                foreach ($mainrec['blog_category'] as $key => $rec) {
                    $record[$k]['category'][] = $rec['category']['category_name'];
                }
            }
            unset($record[$k]['blog_category']);
            $record[$k]['category']=implode(',',$record[$k]['category']);
        }

        return $record;

    }

    public static function createBlog($param){

        $record=new Blogs();
        $record->user_id=$param['user_id'];
        $record->blog_title=$param['blog_title'];
        $record->blog_content=$param['blog_content'];
        $record->blog_image=$param['blog_image'];
        $record->blog_author=$param['blog_author'];
        $record->save();

        $lastId=$record->id;

        foreach($param['blog_category'] as $cate){
            $createcategory=\App\Blog_category::insertBlogCategory(array('blog_id'=>$lastId,'category_id'=>$cate));
        }

        return true;
    }
}
