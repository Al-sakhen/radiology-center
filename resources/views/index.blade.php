<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Medino</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('EndUserAssets/assets/images/logo/favicon.png') }}" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('EndUserAssets/assets/css/animate-3.7.0.css') }}">
    <link rel="stylesheet" href="{{ asset('EndUserAssets/assets/css/font-awesome-4.7.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('EndUserAssets/assets/css/bootstrap-4.1.3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('EndUserAssets/assets/css/owl-carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('EndUserAssets/assets/css/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('EndUserAssets/assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('EndUserAssets/assets/css/style.css') }}">
</head>

<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 d-md-flex">
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-mobile"></i></span> call us now! +
                            {{ $public_center_informations->phone }}
                        </h6>
                        <h6 class="mr-3"><span class="mr-2"><i class="fa fa-envelope-o"></i></span>
                            {{ $public_center_informations->email }}
                        </h6>
                        <h6><span class="mr-2"><i class="fa fa-map-marker"></i></span>
                            {{ $public_center_informations->address }}
                        </h6>
                    </div>
                    <div class="col-lg-3">
                        <div class="social-links">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="index.html"><img src="{{ asset('EndUserAssets/assets/images/logo/logo.png') }}"
                                alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="index.html">Home</a></li>
                            <li><a href="doctors.html">doctors</a></li>


                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav><!-- #nav-menu-container -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h4>Caring for better life</h4>
                    <h1>Leading the way in medical excellence</h1>
                    <p>Earth greater grass for good. Place for divide evening yielding them that. Creeping beginning
                        over gathered brought.</p>
                    <a href="" class="template-btn mt-3">take appointment</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Feature Area Starts -->
    <section class="feature-area section-padding">
        <div class="container">
            <div class="row">
                @forelse ($services as $service)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-feature text-center item-padding">
                            <div style="height: 250px;overflow: hidden;"
                                class="d-flex align-items-center justify-content-center">
                                <img style="object-fit: contain"
                                    src="{{ $service->image ? asset('storage/' . $service->image) : asset('EndUserAssets/assets/images/feature1.png') }}
                            "
                                    alt="{{ $service->name }}" class="img-fluid">
                            </div>
                            <h3 class="pt-3">{{ $service->name }}</h3>
                            <p class="pt-3">
                                {{ $service->description }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-3 col-md-6">
                        <div class="single-feature text-center item-padding">
                            <img src="{{ asset('EndUserAssets/assets/images/feature1.png') }}" alt="">
                            <h3>advance technology</h3>
                            <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't
                                bearing
                                tree appear</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-feature text-center item-padding mt-4 mt-md-0">
                            <img src="{{ asset('EndUserAssets/assets/images/feature2.png') }}" alt="">
                            <h3>comfortable place</h3>
                            <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't
                                bearing
                                tree appear</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-feature text-center item-padding mt-4 mt-lg-0">
                            <img src="{{ asset('EndUserAssets/assets/images/feature3.png') }}" alt="">
                            <h3>quality equipment</h3>
                            <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't
                                bearing
                                tree appear</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-feature text-center item-padding mt-4 mt-lg-0">
                            <img src="{{ asset('EndUserAssets/assets/images/feature4.png') }}" alt="">
                            <h3>friendly staff</h3>
                            <p class="pt-3">Creeping for female light years that lesser can't evening heaven isn't
                                bearing
                                tree appear</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Feature Area End -->

    <!-- Welcome Area Starts -->
    <section class="welcome-area section-padding3">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 align-self-center">
                    <div class="welcome-img">
                        <img src="{{ asset('EndUserAssets/assets/images/welcome.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="welcome-text mt-5 mt-lg-0">
                        {!! $public_center_informations->description !!}
                        <a href="#" class="template-btn mt-3">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->



    <!-- Patient Area Starts -->
    <section class="patient-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>Patient are saying</h2>
                        <p>Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree
                            word link available in the service for subdue fruit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="single-patient mb-4">
                        <h3>daren jhonson</h3>
                        <h5>hp specialist</h5>
                        <p class="pt-3">Elementum libero hac leo integer. Risus hac road parturient feugiat. Litora
                            cursus hendrerit bib elit Tempus inceptos posuere metus.</p>
                    </div>
                    <div class="single-patient">
                        <h3>black heiden</h3>
                        <h5>hp specialist</h5>
                        <p class="pt-3">Elementum libero hac leo integer. Risus hac road parturient feugiat. Litora
                            cursus hendrerit bib elit Tempus inceptos posuere metus.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 align-self-center">
                    <div class="appointment-form text-center mt-5 mt-lg-0">
                        <h3 class="mb-5">appointment now</h3>
                        <form action="{{ route('contactUs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Your Name"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Your Email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email'" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" placeholder="Your Phone"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Phone'" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="dob" id="datepicker" placeholder="Date of Birth"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date of Birth'"
                                    required>
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control" required>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="message" cols="6" rows="7" placeholder="Message" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Message'" required></textarea>
                            </div>
                            <button href="#" class="template-btn" style="border: none">appointment now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Patient Area Starts -->

    <!-- Specialist Area Starts -->
    <section class="specialist-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>Our specialish</h2>
                        <p>Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree
                            word link available in the service for subdue fruit.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @forelse ($doctors as $doctor)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-doctor mb-4 mb-lg-0">
                            <div class="doctor-img">
                                <img src="{{ asset('storage/'.$doctor->image) }}" alt="{{ $doctor->name }}"
                                    class="img-fluid">
                            </div>
                            <div class="content-area">
                                <div class="doctor-name text-center">
                                    <h3>
                                        {{ $doctor->name }}
                                    </h3>
                                </div>
                                <div class="doctor-text text-center">
                                    <p>
                                        {{ $doctor->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty

                    <div class="col-lg-3 col-sm-6">
                        <div class="single-doctor mb-4 mb-lg-0">
                            <div class="doctor-img">
                                <img src="{{ asset('EndUserAssets/assets/images/doctor1.jpg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="content-area">
                                <div class="doctor-name text-center">
                                    <h3>ethel davis</h3>
                                    <h6>sr. faculty data science</h6>
                                </div>
                                <div class="doctor-text text-center">
                                    <p>If you are looking at blank cassettes on the web, you may be very confused at
                                        the.
                                    </p>
                                    <ul class="doctor-icon">
                                        <li><a href="#"><i class="fa fa-facebook"></i><a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i><a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i><a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i><a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-doctor mb-4 mb-lg-0">
                            <div class="doctor-img">
                                <img src="{{ asset('EndUserAssets/assets/images/doctor2.jpg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="content-area">
                                <div class="doctor-name text-center">
                                    <h3>dand mories</h3>
                                    <h6>sr. faculty plastic surgery</h6>
                                </div>
                                <div class="doctor-text text-center">
                                    <p>If you are looking at blank cassettes on the web, you may be very confused at
                                        the.
                                    </p>
                                    <ul class="doctor-icon">
                                        <li><a href="#"><i class="fa fa-facebook"></i><a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i><a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i><a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i><a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-doctor mb-4 mb-sm-0">
                            <div class="doctor-img">
                                <img src="{{ asset('EndUserAssets/assets/images/doctor3.jpg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="content-area">
                                <div class="doctor-name text-center">
                                    <h3>align board</h3>
                                    <h6>sr. faculty data science</h6>
                                </div>
                                <div class="doctor-text text-center">
                                    <p>If you are looking at blank cassettes on the web, you may be very confused at
                                        the.
                                    </p>
                                    <ul class="doctor-icon">
                                        <li><a href="#"><i class="fa fa-facebook"></i><a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i><a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i><a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i><a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-doctor">
                            <div class="doctor-img">
                                <img src="{{ asset('EndUserAssets/assets/images/doctor4.jpg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="content-area">
                                <div class="doctor-name text-center">
                                    <h3>jeson limit</h3>
                                    <h6>sr. faculty plastic surgery</h6>
                                </div>
                                <div class="doctor-text text-center">
                                    <p>If you are looking at blank cassettes on the web, you may be very confused at
                                        the.
                                    </p>
                                    <ul class="doctor-icon">
                                        <li><a href="#"><i class="fa fa-facebook"></i><a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i><a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i><a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i><a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Specialist Area Starts -->

    <!-- Hotline Area Starts -->
    <section class="hotline-area text-center section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Emergency hotline</h2>
                    <span>(+01) – 256 567 550</span>
                    <p class="pt-3">We provide 24/7 customer support. Please feel free to contact us <br>for
                        emergency case.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Hotline Area End -->


    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">top products</h3>
                            <ul>
                                <li class="mb-2"><a href="#">managed website</a></li>
                                <li class="mb-2"><a href="#">managed reputation</a></li>
                                <li class="mb-2"><a href="#">power tools</a></li>
                                <li><a href="#">marketing service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">newsletter</h3>
                            <p class="mb-4">You can trust us. we only send promo offers, not a single.</p>
                            <form action="#">
                                <input type="email" placeholder="Your email here" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Your email here'" required>
                                <button type="submit" class="template-btn">subscribe now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-lg-3">
                        <div class="single-widge-home">
                            <h3 class="mb-4">instagram feed</h3>
                            <div class="feed">
                                <img src="{{ asset('EndUserAssets/assets/images/feed1.jpg') }}" alt="feed">
                                <img src="{{ asset('EndUserAssets/assets/images/feed2.jpg') }}" alt="feed">
                                <img src="{{ asset('EndUserAssets/assets/images/feed3.jpg') }}" alt="feed">
                                <img src="{{ asset('EndUserAssets/assets/images/feed4.jpg') }}" alt="feed">
                                <img src="{{ asset('EndUserAssets/assets/images/feed5.jpg') }}" alt="feed">
                                <img src="{{ asset('EndUserAssets/assets/images/feed6.jpg') }}" alt="feed">
                                <img src="{{ asset('EndUserAssets/assets/images/feed7.jpg') }}" alt="feed">
                                <img src="{{ asset('EndUserAssets/assets/images/feed8.jpg') }}" alt="feed">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <span>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="{{ asset('EndUserAssets/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('EndUserAssets/assets/js/vendor/bootstrap-4.1.3.min.js') }}"></script>
    <script src="{{ asset('EndUserAssets/assets/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('EndUserAssets/assets/js/vendor/owl-carousel.min.js') }}"></script>
    <script src="{{ asset('EndUserAssets/assets/js/vendor/jquery.datetimepicker.full.min.js') }}"></script>
    {{-- <script src="{{ asset('EndUserAssets/assets/js/vendor/jquery.nice-select.min.js') }}"></script> --}}
    <script src="{{ asset('EndUserAssets/assets/js/vendor/superfish.min.js') }}"></script>
    <script src="{{ asset('EndUserAssets/assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('seelct').niceSelect();
        })
    </script>

</body>

</html>
