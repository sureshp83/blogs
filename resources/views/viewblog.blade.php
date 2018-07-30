@extends('layouts.app')
@section('contentheader_title','Blog Detail')
@section('main-content')
    <div class="box box-primary admin">
        <div class="box-header with-border">
            <h3 class="box-title">Blog Detail</h3>
            <a href="{{URL::to('home')}}" class="btn btn-primary pull-right">Back</a>
        </div>

        <div class="box-body">

            <div class="row">
                <div class="col-md-3 col-sm-3 col-lg-3">
                    <label>Blog Title</label>
                    <h2>{{$blog->blog_title}}</h2>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-3">
                    <label>Blog Author</label>
                    <h2>{{$blog->blog_author}}</h2>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3">
                <label>Blog Image</label>
                <img src="{{asset('images/blogimg')}}/{{$blog->blog_image}}">
            </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-lg-3">
                    <label>Blog Content</label>
                    {{$blog->blog_content}}
                </div>
            </div>

    </div>

@endsection