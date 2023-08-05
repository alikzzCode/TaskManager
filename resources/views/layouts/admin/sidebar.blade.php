<aside class="main-sidebar sidebar-dark-primary">

    <!-- Sidebar -->
    <div class="sidebar">
        <div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-center mb-4">
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                مدیریت تسک ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.tasks.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>افزودن تسک</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.tasks.all')}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست تسک ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-sitemap"></i>
                            <p>دسته بندی ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('admin.categories.all')}}" class="nav-link">
                                    <i class="nav-icon fa fa-list"></i>
                                    <p>لیست دسته بندی ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.tasks.create')}}" class="nav-link">
                                    <i class="nav-icon fa fa-plus"></i>
                                    <p class="text">افزودن دسته بندی</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                مدیریت کاربران
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.users.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>افزودن</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.users.all')}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.dash.main')}}" class="nav-link">
                            <i class="nav-icon fa fa-bar-chart"></i>
                            <p class="text">گزارش ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('auth.logout')}}" class="nav-link">
                            <i class="nav-icon fa fa-sign-out"></i>
                            <p class="text">خروج</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
