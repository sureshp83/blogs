@extends('layouts.app')
@section('contentheader_title','New Blog')
@section('main-content')
    <div class="box box-primary admin">
        <form role="form" method="post" id="createblog" name="createblog" action="{{route('blog.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-header with-border">
                <h3 class="box-title">Blog Detail</h3>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-3 col-sm-3 col-lg-3">
                        <div class="form-group {{$errors->has('blog_author') ? ' has-error' :''}}">
                            <label class="control-label">Blog Author</label>
                            <input type="text" class="form-control" name="blog_author" value="{{old('blog_author')}}">
                            @if($errors->has('blog_author'))
                                <span class="help-block">
                                    <strong>{{$errors->first('blog_author')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3">
                        <div class="form-group {{$errors->has('blog_title') ? ' has-error' :''}}">
                            <label class="control-label">Blog Title</label>
                            <input type="text" class="form-control" name="blog_title" value="{{old('blog_title')}}">
                            @if($errors->has('blog_title'))
                                <span class="help-block">
                                    <strong>{{$errors->first('blog_title')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3">
                        <div class="form-group {{$errors->has('blog_category') ? ' has-error' :''}}">
                            <label class="control-label">Blog Category</label>
                            <select class="form-control select2" name="blog_category[]" id="blog_category" multiple="multiple" data-placeholder="Select a State"
                                    style="width: 100%;">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>@if($errors->has('blog_category'))
                                <span class="help-block">
                                    <strong>{{$errors->first('blog_category')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="form-group {{$errors->has('blog_content') ? ' has-error' :''}}">
                            <label class="control-label">Blog Content</label>
                            <textarea name="blog_content" id="blog_content" class="form-control" rows="10" cols="10">{{old('blog_content')}}</textarea>
                            @if($errors->has('blog_content'))
                                <span class="help-block">
                                    <strong>{{$errors->first('blog_content')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="form-group {{$errors->has('blog_image') ? ' has-error' :''}}">
                            <label class="control-label">Blog Image</label>
                            <input type="file" name="blog_image" id="blog_image" class="form-control">
                            @if($errors->has('blog_image'))
                                <span class="help-block">
                                    <strong>{{$errors->first('blog_image')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <a class="btn btn-default" href="{{route('home')}}">Cancle</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $('.select2').select2({

        });
    </script>
@endsection