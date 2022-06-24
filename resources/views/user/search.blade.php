@extends('layouts.site')
@section('title')
@section('main')
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-100 p-lr-0-lg">
            <a href="{{ route('home.index') }}" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">
                Result: {{ $key }}
            </span>
        </div>
    </div>
    <!-- Product -->
    <section class="bg0 p-t-20 p-b-140">
        <div class="container">
            <div class="row isotope-grid">
                @foreach ($product as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $item->cat->slug }}">
                        <!-- Block2 -->
                        <a href="{{ route('home.view', ['id' => $item->id, 'slug' => $item->slug]) }}">
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ url('uploads') }}/product/{{ $item->image }}" alt="IMG-PRODUCT">

                                    <a href="#"
                                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                                        THÔNG TIN
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $item->name }}
                                        </a>

                                        <span class="stext-105 cl3">
                                            {{ number_format($item->price, 0, '', '.') . ' VND' }}
                                        </span>
                                    </div>

                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <img class="icon-heart1 dis-block trans-04"
                                                src="{{ url('site') }}/images/icons/icon-heart-01.png" alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                src="{{ url('site') }}/images/icons/icon-heart-02.png" alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        </div>
    @endsection
