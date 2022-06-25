<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Danh mục
                </h4>

                <ul>
                    @foreach ($category as $item)
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                {{ $item->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Bài viết
                </h4>
                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Bài viết 1
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Bài viết 2
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Bài viết 3
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Bài viết 4
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Liên hệ
                </h4>
                <p class="stext-107 cl7 size-201">
                    Nếu có bất cứ câu hỏi nào? Hãy liên hệ với chúng tôi tại cửa hàng tại Tay Nguyen University,
                    Buon Ma Thuot, Dak Lak hoặc gọi cho chúng tôi theo số (+1) 96
                </p>

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Tin tức mới
                </h4>

                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                            placeholder="Email">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Đăng kí
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-t-40">
            <div class="flex-c-m flex-w p-b-18">
                <a href="#" class="m-all-1">
                    <img src="{{ url('site') }}/images/icons/icon-pay-01.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="{{ url('site') }}/images/icons/icon-pay-02.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="{{ url('site') }}/images/icons/icon-pay-03.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="{{ url('site') }}/images/icons/icon-pay-04.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="{{ url('site') }}/images/icons/icon-pay-05.png" alt="ICON-PAY">
                </a>
            </div>

            <p class="stext-107 cl6 txt-center">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | Made with <i class="fa fa-heart-o"
                    aria-hidden="true"></i> by <a class="creator-info" href="https://www.facebook.com/iamrockleee"
                    target="_blank">songvedem</a></a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            </p>
        </div>
    </div>
</footer>
<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>
@if (Session::has('success'))
    <!-- Toast Message -->
    <div id="swal-overlay" class="swal-overlay swal-overlay--show-modal" tabindex="-1">
        <div id="swal-modal" class="swal-modal">
            <div class="toast">
                <div class="swal-icon swal-icon--success">
                    <span class="swal-icon--success__line swal-icon--success__line--long"></span>
                    <span class="swal-icon--success__line swal-icon--success__line--tip"></span>

                    <div class="swal-icon--success__ring"></div>
                    <div class="swal-icon--success__hide-corners"></div>
                </div>
                <div class="swal-title" style="">
                    Đặt Hàng Thành Công!
                </div>
                <div class="swal-text" style="">vui lòng kiểm tra email !</div>
                <div class="swal-footer">
                    <div class="swal-button-container">

                        <button id="swal-button" class="swal-button swal-button--confirm">OK</button>

                        <div class="swal-button__loader">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
