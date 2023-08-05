@extends('layouts.admin.master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-4">
          <div class="col-12">
            <h1 class="m-0 text-dark">
                <a class="nav-link drawer" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                تسک ها
                <a class="btn btn-primary float-left text-white py-2 px-4" href="{{ route('admin.tasks.create') }}">افزودن تسک جدید</a>
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
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">لیست تسک ها</h3>

                          <div class="card-tools">
                              <div class="input-group input-group-sm" style="width: 150px;">
                                  <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                  <div class="input-group-append">
                                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="table table-striped table-valign-middle mb-0">
                          <table class="table table-hover mb-0">
                              <tbody>
                              <tr>
                                  <th>آیدی</th>
                                  <th>عنوان</th>
                                  <th>دسته بندی</th>
                                  <th>کاربر</th>
                                  <th>توضیحات</th>
                                  <th>وضعیت</th>
                                  <th>ضمیمه</th>
                                  <th>زمان پایان</th>
                                  <th>اولویت</th>
                                  <th>زمان</th>
                                  <th>عملیات</th>
                              </tr>

                              @foreach ($tasks as $task)
{{--                                  {{dd($tasks)}}--}}
                              <tr>
                                <td>{{ $task->id }}</td>
                                <td>
                                    {{ $task->title }}</td>
                                <td>{{ $task->category->title ?? 'none' }}</td>
                                <td>{{ $task->user->name ?? 'none' }}</td>
                                <td>{!! substr($task->description, 0, 15) !!}</td>
                                <td>{{$task->status}}</td>
                                <td>
                                    <a href="{{ route('admin.tasks.download.attachments', $task->id) }}" class="btn btn-default btn-icons" title="لینک دانلود"><i class="fa fa-link"></i></a>
                                </td>
                                <td>{{ $task->actualEndDate ?? 'On Going' }}</td>
                                <td>{{ $task->priority }} </td>
                                <td>{{ $task->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-default btn-icons"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('admin.tasks.delete', $task->id) }}" method="post" style="display: inline">
                                      @csrf
                                      @method('delete')
                                      <button href="" class="btn btn-default btn-icons"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                              @endforeach

                              </tbody></table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <div class="d-flex justify-content-center">
                      {{ $tasks->links() }}
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
