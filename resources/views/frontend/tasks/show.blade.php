@extends('layouts.frontend.master')


@section('content')

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-t-30">
            <a href="{{route('home.tasks.all')}}" class="mtext-106 cl8 hov-cl1 trans-04">
                خانه
                <i class="fa fa-angle-left m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <p class="mtext-106 cl8 trans-04">
                {{$task->category->title}}
                <i class="fa fa-angle-left m-l-9 m-r-10" aria-hidden="true"></i>
            </p>

            <span class="mtext-106 cl4">
				{{$task->title}}
			</span>
        </div>
    </div>

    <!-- task Detail -->
    <section class="sec-task-detail bg0 p-t-65 p-b-60">
        <div class="container">
            @include('errors.message')
            <div class="row">

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">

                        <h2 class="ltext-105 cl2 js-name-detail p-b-14">
                            {{ $task->title }}
                        </h2>

                        <span class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $task->category->title }}
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            اولویت :
                        <p>{!! $task->priority !!}</p>
                        </p>

                        <p class="stext-102 cl3 p-t-23">
                            توضیحات :{!! $task->description !!}
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            @if($task->status === 'In Progress')
                                <form action="{{ route('home.tasks.done', $task->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="flex-w flex-l-m p-b-10">
                                        <div class="flex-w flex-m respon6-next">
                                            <button type="submit"
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                انجام
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <button type="submit"
                                        class="disabled btn flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
                                        disabled>
                                    پایان یافته
                                </button>
                            @endif
                            @if ($task->status == 'In Progress')
                                <div class="flex-w flex-m respon6-next">
                                    <a  href="{{route('home.tasks.edit',$task->id)}}">
                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            ادیت
                                        </button>
                                    </a>
                                </div>
                            @endif

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
                            @include('errors.message')
                            <div class="how-pos2 p-lr-15-md">
                                @if($task->status === 'In Progress')
                                    <form action="{{route('home.tasks.comment',$task->id)}}" method="get">
                                        @method('post')
                                        @csrf
                                        <p class="mtext-106 cl6" style="line-height: 40px">
                                        <div class="container justify-content-center mt-5 border-left border-right">
                                            <div class="d-flex justify-content-center pt-3 pb-2">
                                                <input type="text" name="content" placeholder="+ Add a note"
                                                       class="form-control">
                                            </div>
                                            <input type="submit" hidden/>
                                    </form>

                                @endif
                                @foreach($comments as $comment)
                                    <div class="card-body d-flex justify-content-center py-2">
                                        <div class="second py-2 px-2" style="background-color: #edf6fc"><span
                                                class="h5">{{$comment->content}}</span>
                                            <div class="d-flex justify-content-between py-1 pt-2">
                                                <div>
                                                    <span class="text2">{{$comment->task->user->name}}</span>
                                                </div>
                                                <div>
                                                    <span class="text2">{{$comment->created_at}}</span>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
                                            {{ $task->created_by }}
											</span>
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
											<span class="mtext-106 cl3 size-205">
                                                assignee
                                            </span>
                                        <span class="mtext-106 size-206 ">
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
                                    <li class="flex-w flex-t p-b-7">
											<span class="mtext-106 cl3 size-205">
												زمان
											</span>
                                        @if($task->status === 'InProgress')

                                            <span class="mtext-106 cl6 size-206">
                                                {!! now()->diffInHours($task->created_at) !!}
                                            </span>
                                        @else

                                            <span class="mtext-106 cl6 size-206">
                                                {!! $task->created_at->diffInHours($task->actualEndDate) !!}
                                            </span>
                                        @endif
                                    </li>
                                    <li class="flex-w flex-t p-b-7">
											<span class="mtext-106 cl3 size-205">
                                                وضعیت تسک
                                            </span>
                                        <span class="mtext-106 size-206">
                                            {{ $task->status }}
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
                                        @foreach($attachments as $attachment)
                                            <span class="mtext-106 size-113">

                                                    <a href="{{ route('home.tasks.download.attachments', $task->id) }}"
                                                       class="btn btn-default btn-icons" title="لینک دانلود"><i
                                                            class="fa fa-link"></i></a>
											</span>
                                        @endforeach

                                        @if($task->status === 'In Progress')
                                            <form action="{{ route('home.tasks.update', $task->id) }}" method="post"
                                                  enctype="multipart/form-data">
                                                @method('put')
                                                @csrf
                                                <li class="flex-w flex-c-m p-b-7">
											<span class="mtext-106 cl3 size-205">
                                                اضافه کردن ضمیمه
                                            </span>
                                                    <span class="mtext-106 size-115">
                                              <input class="form-control" type="file" name="source_url">
                                                </li>

                                                <button type="submit"
                                                        class="btn btn-primary float-left">ذخیره کردن
                                                </button>
                                            </form>
                                    @endif
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
                        <div class="task item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">

                                    <a href="#"
                                       class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                        مشاهده سریع
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{ route('home.tasks.show', $similarTask->id) }}"
                                           class="mtext-106 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
