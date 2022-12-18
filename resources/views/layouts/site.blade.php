<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>
<body class="animsition">

    @include('header')
    @yield('main')
    @include('footer')



    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ url('public/site') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/daterangepicker/moment.min.js"></script>
    <script src="{{ url('public/site') }}/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/slick/slick.min.js"></script>
    <script src="{{ url('public/site') }}/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    // get url selected
    $(document).ready(function (){
      $('#select_price').on('change', function () {
          var url = $(this).val();
          if (url) {
              window.location = url; // redirect
          }
          return false;
      });
    })
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        const toastOverlay = document.getElementById('swal-overlay');

        const btnModal = document.getElementById('swal-button');
        if(btnModal){
            btnModal.addEventListener("click", () => {
                document.getElementById('swal-modal').style.display = 'none';
                document.getElementById('swal-overlay').style.display = 'none';
                e.stopPropagation();
            })
            toastOverlay.addEventListener("click", () => {
                document.getElementById('swal-overlay').style.display = 'none';
            })
        }



    </script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('public/site') }}/js/main.js"></script>
    <!--===============================================================================================-->
    @yield('js')
</body>

</html>
