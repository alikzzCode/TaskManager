@extends('layouts.frontend.master')

@section('content')
    <!-- Product -->
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="mtext-106 cl6 hov1 bor3 trans-04 m-l-32 m-tb-5 how-active1" data-filter="*">
                        اولویت ها
                    </button>
                    <button class="mtext-106 cl6 hov1 bor3 trans-04 m-l-32 m-tb-5" data-filter=".priorityhigh">
                        زیاد
                    </button>
                    <button class="mtext-106 cl6 hov1 bor3 trans-04 m-l-32 m-tb-5" data-filter=".prioritymedium">
                        متوسط
                    </button>
                    <button class="mtext-106 cl6 hov1 bor3 trans-04 m-l-32 m-tb-5" data-filter=".prioritylow">
                        کم
                    </button>
                </div>


                <div class="flex-w flex-c-m m-tb-10">
{{--                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-filter">--}}
{{--                        <i class="icon-filter cl2 m-l-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>--}}
{{--                        <i class="icon-close-filter cl2 m-l-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>--}}
{{--                        فیلتر کردن--}}
{{--                    </div>--}}
                    <a href="{{route('home.tasks.create')}}">
                        <button class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 m-r-8">
                            <i class="icon-search cl2 m-l-6 fs-15 trans-04 zmdi zmdi-plus"></i>
                            افزودن تسک
                        </button>
                    </a>
                </div>
                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
{{--                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">--}}
{{--                        <div class="flex-w flex-l-m filter-tope-group m-tb-10">--}}
{{--                            <button class="mtext-106 cl6 hov1 bor3 trans-04 m-l-32 m-tb-5 how-active1" data-filter="*">--}}
{{--                                اولویت ها--}}
{{--                            </button>--}}
{{--                            <button class="mtext-106 cl6 hov1 bor3 trans-04 m-l-32 m-tb-5" data-filter=".priorityhigh">--}}
{{--                                زیاد--}}
{{--                            </button>--}}
{{--                            <button class="mtext-106 cl6 hov1 bor3 trans-04 m-l-32 m-tb-5" data-filter=".prioritymedium">--}}
{{--                                متوسط--}}
{{--                            </button>--}}
{{--                            <button class="mtext-106 cl6 hov1 bor3 trans-04 m-l-32 m-tb-5" data-filter=".prioritylow">--}}
{{--                                کم--}}
{{--                            </button>--}}
{{--                        </div>--}}


{{--                        <div class="filter-col2 p-r-15 p-b-27">--}}
{{--                            <div class="mtext-102 cl2 p-b-15">--}}
{{--                                وضعیت--}}
{{--                            </div>--}}

{{--                            <ul>--}}
{{--                                <li class="p-b-6">--}}
{{--                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">--}}
{{--                                        همه--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="p-b-6">--}}
{{--                                    <a href="#" class="filter-link stext-106 trans-04">--}}
{{--                                        باز--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="p-b-6">--}}
{{--                                    <a href="#" class="filter-link stext-106 trans-04">--}}
{{--                                        بسته--}}
{{--                                    </a>--}}
{{--                                </li>--}}


{{--                                <li class="p-b-6">--}}
{{--                                    <a href="#" class="filter-link stext-106 trans-04">--}}
{{--                                        نیاز به بازبینی--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

{{--                        <div class="filter-col3 p-r-15 p-b-27 mr-auto">--}}
{{--                            <div class="mtext-102 cl2 p-b-15">--}}
{{--                                مرتب سازی براساس--}}
{{--                            </div>--}}

{{--                            <ul>--}}
{{--                                <li class="p-b-6">--}}
{{--                                    <a href="?filter=orderby&action=default" class="filter-link stext-106 trans-04">--}}
{{--                                        پیش فرض--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="p-b-6">--}}
{{--                                    <a href="?filter=orderby&action=mostPopular" class="filter-link stext-106 trans-04">--}}
{{--                                        محبوبیت--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="p-b-6">--}}
{{--                                    <a href="?filter=orderby&action=newest"--}}
{{--                                       class="filter-link stext-106 trans-04 filter-link-active">--}}
{{--                                        جدیدترین--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="p-b-6">--}}
{{--                                    <a href="?filter=orderby&action=lowToHigh" class="filter-link stext-106 trans-04">--}}
{{--                                        قیمت:‌ کم به زیاد--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="p-b-6">--}}
{{--                                    <a href="?filter=orderby&action=highToLow" class="filter-link stext-106 trans-04">--}}
{{--                                        قیمت:‌زیاد به کم--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

{{--                    </div>--}}
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach ($tasks as $task)
                    <div
                        class="task col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item priority{{$task->priority}} category{{ $task->category_id }}">
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
                                    <a href="{{ route('home.tasks.show', $task->id) }}"
                                       class="mtext-106 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $task->title }}
                                    </a>
                                    <option
                                        value="{{ $task->category->id }}">{{ $task->category->title }}</option>
                                    <span>
                                    اولویت:  {{ $task->priority }}
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    مشاهده بیشتر
                </a>
            </div>
        </div>
    </div>

    <!-- Modal1 -->

@endsection
