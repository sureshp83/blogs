<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Blogs;
class BlogController extends Controller
{

    public  function  getAjaxblogList(Request $request){
        $user_id=\Auth::user()->id;

        $record['data']=Blogs::fetchBlogs(array('user_id'=>$user_id));

        return \Response::json($record,200);
    }

    public function create(){

    }
}
