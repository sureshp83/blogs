@extends('layouts.app')
@section('contentheader_title','Blogs')
@section('main-content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Blogs Listing</h3>
                    <a href="{{route('blog.create')}}" class="btn btn-success pull-right">Create New Blog</a>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Category : </label>
                            <select class="form-control select2" name="category_id[]" id="category_id" multiple="multiple" data-placeholder="Select a State"
                                    style="width: 100%;">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date range:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="datepicker" id="datepicker">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="blogslisting" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Datetime</th>
                            <th>Author</th>
                            <th>Blog Title</th>
                            <th>Blog Image</th>
                            <th>Blog Category</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <script>
        $(function () {
            $('#datepicker').daterangepicker();
            //Initialize Select2 Elements
            $('.select2').select2({

            });

            var dropdownFilter={};
            var dateFilter={};


            var datesection={'dateFilter':dateFilter};
            var dropdownsection={'dropdownFilter':dropdownFilter};

            CalledAjax(datesection,dropdownsection);
            $("#category_id").change(function(){
                dropdownFilter['key']=$(this).val();
                CalledAjax(datesection,dropdownsection);
            });

            $("#datepicker").change(function(){
                dateFilter['key']=$(this).val();
                CalledAjax(datesection,dropdownsection);
            });
        });



        function CalledAjax(datesection,dropdownsection) {

            if ($.fn.dataTable.isDataTable('#blogslisting')) {
                table.destroy();
            }

            var array = {
                '_token': '{{ csrf_token() }}',
                'datesection': datesection,
                'dropdownsection': dropdownsection
            };
            console.log(array);
             table=$('#blogslisting').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                'ajax': {
                    "url":"{{URL::to('/blog/AjaxGetBlogs')}}",
                    "type": "POST",
                    "data":array,
                },
                'columns': [
                    { "data": "id" },
                    { "data": "created_at" },
                    { "data": "blog_author"},
                    { "data": "blog_title"},
                    { "data": "blog_image"},
                    { "data": "category"},
                    { "data": null,
                        "className": "center",
                        "defaultContent": '<a href="javascript:void(0);" class="view_blog">View</a>'
                    }
                ]
            });
            //view
            $('#blogslisting').on('click', 'a.view_blog', function (e) {
                var row  = $(this).parents('tr')[0];
                var blog_id=table.row( row ).data().id;
                $("a.view_blog").attr("href","{{URL::to('blog')}}/"+blog_id+"");
            });
        }
</script>
@endsection
