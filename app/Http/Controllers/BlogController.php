<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Blogs;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=\Auth::user()->id;
        $record['categories']=\App\Categories::all();
        return view('home',$record);
    }

    public function AjaxGetBlogs(){
        $param=\Input::all();
        $user_id=\Auth::user()->id;
        $param['user_id']=$user_id;
        $record['data']=Blogs::fetchBlogs($param);

        return \Response::json($record,200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=\App\Categories::all();

        return view('create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param=\Input::all();
        $validator=\Validator::make($param,[
           'blog_author'=>'required|regex:/^[a-zA-Z0-9_ ]*$/u|max:255',
           'blog_title'=>'required',
           'blog_content'=>'required',
           'blog_category'=>'required',
           'blog_image'=>'required|mimes:jpeg,jpg,png',
        ]);

        if($validator->fails()){
            return \Redirect::to('blog/create')->withInput($param)->withErrors($validator);
        }

        $data=array(
            'user_id'=>\Auth::user()->id,
            'blog_title'=>$param['blog_title'],
            'blog_content'=>$param['blog_content'],
            'blog_author'=>$param['blog_author'],
            'blog_category'=>$param['blog_category']
        );
        //dd(base_path(). '/public/images');
        if($request->hasFile('blog_image')){
            $filename=\Auth::user()->id."blgimg".time().".".$request->file('blog_image')->getClientOriginalExtension();
            $request->file('blog_image')->move(base_path() . '/public/images/blogimg', $filename);
            $data['blog_image']=$filename;
        }

        $createBlog=Blogs::createBlog($data);
        \Session::flash('message','Blog Created Successfully.!!');
        \Session::flash('alert-class','alert-success');
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['blog']=Blogs::where('id',$id)->with('blog_category')->first();

        return view('viewblog',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
