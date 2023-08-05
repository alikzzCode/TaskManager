@extends('layouts.admin.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <a class="nav-link drawer" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                            گزارش کتگوری ها</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">


            <div class="container-fluid">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h5>{{$category->title}}</h5>
                                    <h5>{!! $taskCount = \App\Models\Task::where('category_id',$category->id)->count(); !!}</h5>


                                </div>
                                <div class="icon">
                                    <i class=""></i>

                                </div>
                            </div>
                        </div>
                    @endforeach

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
@endsection
