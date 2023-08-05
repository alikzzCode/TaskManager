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
                گزارش ها</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>{{$taskCount}}</h3>

                          <p>تسک ها</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-tasks"></i>
                      </div>
                      <a href="{{route('admin.tasks.all')}}" class="small-box-footer">اطلاعات بیشتر</a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-md-6 col-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>{{$categoryCount}}</h3>

                          <p>دسته بندی ها</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-sitemap"></i>
                      </div>
                      <a href="{{route('admin.dash.category')}}" class="small-box-footer">اطلاعات بیشتر</a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-md-6 col-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>{{$actionCount}}</h3>

                          <p>اکشن های امروز</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-edit"></i>
                      </div>
                      <a href="{{route('admin.dash.activity')}}" class="small-box-footer">اطلاعات بیشتر</a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-md-6 col-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3>{{$userCount}}</h3>

                          <p>کاربران</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-user"></i>
                      </div>
                      <a href="{{route('admin.users.all')}}" class="small-box-footer">اطلاعات بیشتر</a>
                  </div>
              </div>
              <!-- ./col -->
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
