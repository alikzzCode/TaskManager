@extends('layouts.frontend.master')


@section('content')

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-t-30">
            <a href="index.html" class="mtext-106 cl8 hov-cl1 trans-04">
                خانه
                <i class="fa fa-angle-left m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="task.html" class="mtext-106 cl8 hov-cl1 trans-04">
                کارت ویزیت
                <i class="fa fa-angle-left m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="mtext-106 cl4">
				کارت ویزیت مشاور املاک
			</span>
        </div>
    </div>




    <!-- task Detail -->
    <section class="sec-task-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">

                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $task->title }}
                        </h4>

                        <span class="mtext-106 cl2">
							اولویت : {{ $task->priority }}

                        <p class="stext-102 cl3 p-t-23">
                            {!! $task->description !!}
                        </p>

                            <!--  -->
                        <div class="p-t-33">

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="flex-w flex-m respon6-next">
                                    <a href=""
                                       class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">انجام</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">کامنت ها</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#information" role="tab">توضیحات</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#attachments" role="tab">ضمیمه ها</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="mtext-106 cl6" style="line-height: 40px">
                                    {!! $task->description !!}
                                </p>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="information" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <ul class="p-lr-28 p-lr-15-sm">
                                        <li class="flex-w flex-t p-b-7">
											<span class="mtext-106 cl3 size-205">
                                                ایجاد کننده تسک
                                            </span>
                                            <span class="mtext-106 size-206">
                                                												{{ $task->user->name }}

											</span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
											<span class="mtext-106 cl3 size-205">
												تاریخ ایجاد
											</span>

                                            <span class="mtext-106 cl6 size-206">
												{{ $task->created_at }}
											</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="attachments" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <ul class="p-lr-28 p-lr-15-sm">
                                        <li class="flex-w flex-t p-b-7">
											<span class="mtext-106 cl3 size-205">
فایل های ضمیمه                                            </span>
                                            <span class="mtext-106 size-206">
                                    <a href="{{ route('admin.tasks.download.attachments', $task->id) }}"
                                       class="btn btn-default btn-icons" title="لینک دانلود"><i class="fa fa-link"></i></a>

											</span>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Related tasks -->
    <section class="sec-relate-task bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    تسک های مشابه
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                                        @foreach ($similarTasks as $similarTask)
                                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                            <!-- Block2 -->
                                            <div class="block2">
                                                <div class="block2-pic hov-img0">

                                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                        مشاهده سریع
                                                    </a>
                                                </div>

                                                <div class="block2-txt flex-w flex-t p-t-14">
                                                    <div class="block2-txt-child1 flex-col-l ">
                                                        <a href="{{ route('home.tasks.show', $similarTask->id) }}" class="mtext-106 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                           {{ $similarTask->title }}
                                                        </a>

                                                        <span class="stext-105 cl3">
                    								اولویت :	{{ $similarTask->priority }}
                    								</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                </div>
            </div>
        </div>
    </section>

@endsection
