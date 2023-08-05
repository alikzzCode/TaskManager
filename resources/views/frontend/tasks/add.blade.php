@extends('layouts.frontend.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4">
                    <div class="col-12">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @include('errors.message')
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card card-defualt">
                            <!-- form start -->
                            <form action="{{route('home.tasks.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>عنوان</label>
                                                <input type="text" class="form-control" name="title"
                                                       placeholder="عنوان تسک را وارد کنید">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>دسته بندی</label>
                                                <select class="form-control" name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> کاربر </label>
                                                <select class="form-control" name="user_id">
                                                    <option
                                                        value="{{ $loggedInUser->id }}">{{ $loggedInUser->name }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> اولویت </label>
                                                <select class="form-control" name="priority">
                                                    <option value="high">
                                                        زیاد
                                                    </option>
                                                    <option value="medium">
                                                        متوسط
                                                    </option>
                                                    <option value="low">
                                                        کم
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <form class="form-group">
                                                <label>ددلاین</label>
                                                <input type="datetime-local" class="form-control"
                                                       name="expectedEndDate">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> ضمیمه</label>
                                            <input class="form-control" type="file" name="source_url">
                                        </div>
                                    </div>

                                </div>

                        </div>

                        <div class="form-group" >
                            <label>توضیحات</label>
                            <textarea name="description" id="editor" style="width: 50%">
                                لطفا متن مورد نظر خودتان را وارد کنید
                            </textarea>
                            <button type="submit" class="btn btn-primary  flex-c">ذخیره کردن</button>


                        <!-- /.card-body -->


                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
