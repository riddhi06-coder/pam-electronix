
<!DOCTYPE html>
<html lang="en-US">

<head>
    @include('components.frontend.head')
</head>


<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">
        <div id="wrapper_full" class="content_all_warpper">

                @include('components.frontend.header')


                <div class="page_header_default style_one">
                    <div class="page_header_content">
                        <div class="auto-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner_title_inner">
                                        <div class="title_page">
                                            Cart
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="breadcrumbs creote">
                                        <ul class="breadcrumb m-auto">
                                            <li><a href="index.html">Home</a></li>
                                            <li class="active">Cart</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @include('components.frontend.footer')
            
                @include('components.frontend.main-js')

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.querySelectorAll('.quantity').forEach(function (container) {
                            const minusBtn = container.querySelector('.minus');
                            const plusBtn = container.querySelector('.plus');
                            const input = container.querySelector('.qty');

                            minusBtn.addEventListener('click', function () {
                                let value = parseInt(input.value) || 0;
                                if (value > 1) {
                                    input.value = value - 1;
                                }
                            });

                            plusBtn.addEventListener('click', function () {
                                let value = parseInt(input.value) || 0;
                                input.value = value + 1;
                            });
                        });
                    });
                </script>


</body>
</html>