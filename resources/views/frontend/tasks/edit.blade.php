@extends('layouts.frontend.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">
                            تسک ها / ویرایش {{ $task->title }}

                        </h1>
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
                            @hasanyrole('admin|manager')

                            <form action="{{ route('home.tasks.change.master', $task->id) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @else
                                    <form action="{{ route('home.tasks.change', $task->id) }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
@endhasanyrole
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>عنوان</label>
                                                <input type="text" class="form-control" name="title"
                                                       placeholder="عنوان تسک را وارد کنید" value="{{ $task->title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>دسته بندی</label>
                                                <select class="form-control" name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @hasanyrole('admin|manager')

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> کاربر </label>
                                                <select class="form-control" name="user_id">
                                                    @foreach ($users as $user)
                                                        <option
                                                            value="{{ $user->id }}" {{ $user->id == $task->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
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
                                        <div class="col-md-3">
                                            <form class="form-group">
                                                <label>ددلاین</label>
                                                <input type="datetime-local" class="form-control"
                                                       name="expectedEndDate">
                                        </div>
                                    </div>
                                    @endhasanyrole

                                    <div class="form-group">
                                        <label>توضیحات</label>
                                        <textarea name="description" id="editor">{{ $task->description }}</textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-left">ذخیره کردن</button>
                                </div>
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
