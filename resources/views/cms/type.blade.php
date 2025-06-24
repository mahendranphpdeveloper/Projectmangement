@php
$sectionHtml = $sections->map(function($section) {
    return Illuminate\Support\Str::slug($section->title, '-');
});
function wrapTextWithSpan($text) {
    return preg_replace('/\{(.*?)\}/', '<span>$1</span>', $text);
    }
function wrapTextWithSpan2($text) {
    return preg_replace('/\{(.*?)\}/', '<span class="year-text">$1</span>', $text);
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <!-- Include Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="{{asset('assets/images/fav.png')}}">
    <!-- Include Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- Include Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Include Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/favv.png')}}"> 
    <title>Jayam Landing Page</title>




    <style>

    </style>

</head>
<style>

.nested-grid::-webkit-scrollbar {
  display: none;
}

.nested-item {
  overflow: hidden; /* Prevent overflow from images */
  border-radius: 8px; /* Optional: add rounded corners */
}

.nested-item img {
  width: 100%; /* Make the image fill the container */
  height: auto; /* Maintain aspect ratio */
  display: block; /* Remove bottom space from images */
}
.d-flex.justify-content-center.star-rating {
  width: max-content;
  justify-content: center;
  align-items: center;
  align-self: center;
}
</style>

<body>
    <header class="header">
        <nav class="nav">
            <div class="nav__data">
                <a href="#" class="nav__logo">
                    <img src="{{ asset('/assets/logo.png')}}" alt="" srcset="">
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__toggle-menu"></i>
                    <i class="ri-close-line nav__toggle-close"></i>
                </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li>
                        <a href="#" class="nav__link">Home</a>
                    </li>
                    <li>
                        <a href="#" class="nav__link">About</a>
                    </li>

                    <!--=============== DROPDOWN 1 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            Services <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <span class="dropdown__title">ECommerce Website</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Full Featured eCommerce Web
                                                development</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Simple eCommerce Web development</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Magento Development</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">WooCommerce Development</a>
                                        </li>
                                    </ul>



                                </div>

                                <div class="dropdown__group">



                                    <span class="dropdown__title">Email Hosting</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Business email hosting</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Enterprise email hosting</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Gsuite</a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="dropdown__group">


                                    <span class="dropdown__title">Digital Marketing</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">SEO, SEM</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">SMO, SMM</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Link Building services</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Content Marketing</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">


                                    <span class="dropdown__title">Mobile App Development</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Android app development</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">iOS App Development</a>
                                        </li>
                                    </ul>
                                </div>


                                <div class="dropdown__group">
                                    <span class="dropdown__title">Web Design & Development</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Web Design/ Re-Design</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Web Development</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Web Applications</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">CMS Web Development</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Web Maintenance</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Web Maintenance</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">UI/UX Design</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Landing Page design</a>
                                        </li>
                                    </ul>



                                </div>


                                <div class="dropdown__group">

                                    <span class="dropdown__title">Web Hosting</span>

                                    <ul class="dropdown__list ">
                                        <li>
                                            <a href="#" class="dropdown__link">Shared Hosting</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Cloud Hosting</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Dedicated Hosting</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">VPS Hosting</a>
                                        </li>

                                    </ul>



                                </div>


                                <div class="dropdown__group">


                                    <span class="dropdown__title">Brand Identity
                                    </span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Logo design</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Brochure design</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Flyer Design</a>
                                        </li>

                                    </ul>
                                </div>



                                <div class="dropdown__group">


                                    <span class="dropdown__title">Domain Registration</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">New Domain Name Registration</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Domain Transfer</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!--=============== DROPDOWN 2 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            Portfolio
                        </div>
                       
                    </li>

                    <li>
                        <a href="#" class="nav__link">Career</a>
                    </li>
                    <li>
                        <a href="#" class="nav__link">Blog</a>
                    </li>
                    <li>
                        <a href="#" class="nav__link contact-us ">Contact us</a>
                    </li>
                 
                    <div class="twobuttons">
                        <a href="tel:9677876445" class="button button-large">
                            <i class="fas fa-phone"></i> +91 96778 76445
                        </a>
                        <a href="#" class="button">Get a Quote</a>
                    </div>


                </ul>
            </div>
        </nav>
    </header>

    <div class="sections-container">
    <div class="client-header logo-section" id="logo-section">
        @if(isset($clientlogos) && isset($logo))
        <div class="client-header">
            <h3>{!! wrapTextWithSpan($logo->title1 ?? 'Trusted by Over {1200+} Customers') !!}</h3>
            <p>{{ $logo->title2 ??'Join a growing community of satisfied users today!' }}</p>
        </div>
        <div class="grid-container area">
            <div class="grid-item column-1">
                    <div class="nested-grid">
                        @if(isset($clientlogos))
                        @foreach ($clientlogos as $logos)
                        <div class="nested-item">
                            <img src="{{ asset('storage/logos/' . $logos->image) }}" alt="Nested Image 1">
                        </div>
                        @endforeach
                        @endif
                    </div>
            </div>
            <div class="grid-item column-2" style="padding-top:0px;">
                <div class="contact">
                    <header style="color:#fff;">
                        <!-- <img src="{{ asset('/assets/undraw_personal_text_re_vqj3.svg')}}" alt="Connect"> -->
                        
                        {!! wrapTextWithSpan($logo->form_title ?? 'Wed <span>Love</span> to Hear from You') !!}
                    </header>
                    <form action="#">
                        <div class="dbl-field">
                            <div class="field">
                                <input type="text" name="name" placeholder="Enter your name">
                                <i class='fas fa-user'></i>
                            </div>
                            <div class="field">
                                <input type="text" name="company" placeholder="Company Name">
                                <i class='fas fa-envelope'></i>
                            </div>
                        </div>
                        <div class="dbl-field">
                            <div class="field">
                                <input type="text" name="email" placeholder="Enter your email">
                                <i class='fas fa-phone-alt'></i>
                            </div>
                            <div class="field">
                                <input type="text" name="phone" placeholder="Enter your phone">
                                <i class='fas fa-globe'></i>
                            </div>
                        </div>
                        <div class="message">
                            <textarea placeholder="Type your Requirements Here" name="message"></textarea>
                        </div>
                        <div class="button-area contact-fomr-btn">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        @endif
    </div>

    <div class="year-of-experience" id="year-of-experience">    
        <div class="counter-header2">
            <h1>
                <div class="first-line">
                    <div class="circle-container">
                        <img src="{{asset('assets/circle2.png')}}" alt="Circle" class="circle-image">
                        <div class="center-number">{{ $getTouchUs->title1 ??'17' }}</div>
                    </div>
                    {!! wrapTextWithSpan2($getTouchUs->title3 ?? '<span class="year-text">Years</span> of Expertise') !!}
                </div>
                <div class="second-line">
                    {{ $getTouchUs->title2 ??'In Delivering Web Development & Digital Marketing Services' }}
                </div>
            </h1>
        </div>
        <div class="counter-section">
            <div class="headof-counter">
                <div class="counter-div">
                    <i class="fa-solid fa-trophy"></i>
                    <span class="num" data-val="{{ intval($getTouchUs->years ?? '18') }}">000</span><i class="fa-solid fa-plus fa-xl" style="color: #63E6BE;"></i>
                    <span class="text">{{ preg_replace('/[\d,]+/', '', $getTouchUs->years ?? 'Years') }}</span>
                </div>

                <div class="counter-div">
                    <i class="fa-solid fa-user-friends"></i>
                    <span class="num" data-val="{{ intval($getTouchUs->clients??'1200') }}">000 </span><i class="fa-solid fa-plus"></i>
                    <span class="text">{{ preg_replace('/[\d,]+/', '', $getTouchUs->clients ?? 'Happy Clients') }}</span>
                </div>

                <div class="counter-div">
                    <i class="fa-solid fa-briefcase"></i>
                    <span class="num" data-val="{{ intval($getTouchUs->projects??'1850') }}">000 </span> <i class="fa-solid fa-plus"></i>
                    <span class="text">{{ preg_replace('/[\d,]+/', '', $getTouchUs->projects ?? 'Projects') }}</span>
                </div>

                <div class="counter-div">
                    <i class="fa-solid fa-thumbs-up"></i>
                    <span class="num" data-val="{{ intval($getTouchUs->reviews??'500') }}">000</span> <i class="fa-solid fa-plus"></i>
                    <span class="text">{{ preg_replace('/[\d,]+/', '', $getTouchUs->reviews ?? 'Reviews') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div id="recent-projects" class="portfolio-slide recent-projects">
        <div class="portfolio-heading proeject-swiper-heading">
            <h3><span> Recent</span> Projects</h3>
            <p class="pro-para">
                {{ $recentProjectContent->content??'' }}
            </p>
        </div>
        <div class="portfolio-container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @if(isset($recentProject))
                    @foreach ($recentProject as $project)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/project_images/' . $project->image) }}" alt="Project 1" class="portfolio-image" />
                        <div class="overlay">
                            <a href=" {{ $project->link }}">
                                <div class="text">{{ $project->name }}
                                    <p>
                                        {{ $project->description }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
    </div>

    <div id="google-reviews" class="ratings-section google-reviews">
        <div class="wrapper">
            <div class="ratings-title">
                <box-icon type='solid' name='check-circle' color="#659D00" size="30px"></box-icon>
                <h3 class="main-title"> <span>Google</span> Ratings & Reviews</h3><br>
            </div>
            <div class="google-rating">
                <p style="color: #263c69;">Hear from Our Satisfied Customers at <a
                        href="https://www.jayamwebsolutions.com" target="_blank">Jayam Web Solutions</a></p>
                <h3 class="rating-score">
                    4.8<span class="star-img"><img src="{{ asset('/assets/fivestar.png')}}" alt="Five Stars" /></span>(80)
                </h3>
            </div>

            <!-- Navigation Arrows -->
            <i id="left" class="fa-solid fa-angle-left"></i>
            <i id="right" class="fa-solid fa-angle-right"></i>

            <!-- Carousel -->
            <ul class="carousel">
                @if(isset($clientReview))
                @foreach ($clientReview as $review)
                    <li class="card">
                        <div class="card-top-container">
                            <div class="img img-left"><a href="{{ $review->client_role??'#' }}" target="_blank">
                                    <img src="{{ asset('storage/' . $review->client_image)}}" alt="First Image" draggable="false">
                            </div>
                            <div>
                                <h2>
                                    <a href="{{ $review->client_role??'#' }}" target="_blank">{{ $review->company_name??'' }}</a>
                                </h2>
                            </div>
                            <div class="img img-right">
                                <img src="{{ asset('/assets/glogo.png')}}" alt="Last Image" draggable="false">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center star-rating">
                            @for ($i = 1; $i <= $review->stars_count; $i++) <!-- Adjusted to include the last star -->
                                <img src="{{ asset('/assets/star.png')}}" alt="Star Rating" class="star">
                            @endfor
                        </div>
                        
                        <p class="scrollable-paragraph">
                            {{ $review->review_content??'' }}
                        </p>
                    </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div id="seo-package" class="seo-packages-header seo-package">
        @if(isset($seo))
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="cus-svg">
            <path fill="#00c0f0" fill-opacity="0.2"
                d="M0,160L40,149.3C80,139,160,117,240,122.7C320,128,400,160,480,186.7C560,213,640,235,720,208C800,181,880,107,960,80C1040,53,1120,75,1200,74.7C1280,75,1360,53,1400,42.7L1440,32L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
            </path>
        </svg>
        <h2>{!! wrapTextWithSpan($seo->title)??'Attractive <span>SEO</span> Packages' !!}</h2>
        <div class="col-6">
            <img src="{{ asset('storage/' . $seo->image)}}" alt="">
        </div>
        <div class="col-6">
            {!! $seo->content !!}
        </div>
        @endif
    </div>

    <div id="price-package" class="pricing-slide price-package">
        <div class="pricing-heading">
            <h3><span> Price</span> & Packages</h3>
        </div>
        <div class="main">
            <div class="offer-container">
                <img src="{{asset('assets/offer3.gif')}}" width="100px" height="100px" alt="Offer gif')}}" class="offer-gif')}}">
            </div>
            <table class="price-table">
                <thead>
                    <tr>
                        <th>Features</th>
                        <th>Basic</th>
                        <th>Medium</th>
                        <th>Enterprise</th>
                        <th>Advanced</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($price))
                    @foreach ($price as $pr)
                    <tr>
                        <td>{{ $pr->future }}</td>
                        <td>{{ $pr->basic }}</td>
                        <td>{{ $pr->medium }}</td>
                        <td>{{ $pr->enterprice }}</td>
                        <td>{{ $pr->advanced }}</td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td></td>
                        <td><a href="#" class="get-started">I'm Interested</a></td>
                        <td><a href="#" class="get-started">I'm Interested</a></td>
                        <td><a href="#" class="get-started">I'm Interested</a></td>
                        <td><a href="#" class="get-started">I'm Interested</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

     <div id="payment-terms" class="payment-terms payment-terms">

        <div class="row prv-inner">
                <div class="col-lg-7 prv-txt-inner">
                    {!! $paymentTerm->content??'' !!}
                </div>
                <div class="col-lg-4">
                    <img class="prv-img" src="{{ asset('/images/contact.gif')}}" alt="">
                </div>
        </div>
    </div>
    </div>

    <footer id="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="column col-lg-3 col-md-5 col-sm-12">
                        <div class="widget news-widget">
                            <h3>Contact Us </h3>
                            <div class="widget-content">

                                <div class="text">
                                    <b class="text-white">Address : </b><br>No.1, First Floor, First Street,<br>
                                    Bharathi Nagar, Tambaram - Mudichur Road<br>
                                    Tambaram West , Chennai - 600063 <br>
                                    Tamil Nadu, India
                                </div>

                                <div class="text footer-next">
                                    <b class="text-white">Phone : </b><br><a href="tel:+914443162953">+91 - 44 - 4316
                                        2953</a> <br>
                                    <a href="tel:+919677876445"> +91 - 9677 87 6445 </a><br>
                                    <a href="tel:+919840599789"> +91 - 9840 59 9789</a> <br>
                                    <a href="tel:+919344637337"> +91 - 93446 37337</a>
                                </div>

                                <div class="text footer-next">
                                    <b class="text-white">Email : </b><br> <a
                                        href="mailto:marketing@jayamwebsolutions.com">marketing@jayamwebsolutions.com</a>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column col-lg-5 col-md-7 col-sm-12">
                        <div class="widget links-widget">
                            <h3>Our Services</h3>
                            <div class="widget-content">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <ul class="list">
                                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a
                                                    href="web-design-company-in-chennai.php"> Web Design &amp;
                                                    Development</a></li>
                                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a
                                                    href="ecommerce-website-development.php">ECommerce
                                                    Website</a></li>
                                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a
                                                    href="seo-company-in-chennai.php">Digital Marketing</a>
                                            </li>
                                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a
                                                    href="mobile-app-development-company-in-chennai.php">Mobile
                                                    App Development</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <ul class="list">
                                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a
                                                    href="web-hosting-in-chennai.php">
                                                    Web Hosting</a></li>
                                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a
                                                    href="email-hosting-in-chennai.php">Email Hosting</a></li>
                                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a
                                                    href="domain-registration-chennai.php">Domain
                                                    Registration</a></li>
                                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a
                                                    href="brand-identity-services-in-chennai.php">Brand
                                                    Identity</a></li>
                                            <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a
                                                    href="privacy-policy.php">Privacy & Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column col-lg-4 col-md-12 col-sm-12" style="padding: 0px;">
                        <div class="footer-widget news-widget">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3774.2825663396698!2d80.09183210852146!3d12.922271759999262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525f722faf2fdf%3A0xe2d593275a30054b!2sJayam%20Web%20Solutions!5e1!3m2!1sen!2sin!4v1581336209957!5m2!1sen!2sin"
                                width="100%" height="370"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="copyright-content">
            <div class="container">
                <div class="copyright-text text-center p-t-15">
                    <p>© 2024 JAYAM WEB SOLUTIONS. All Rights Reserved.</p>
                </div>
            </div>
        </div>

        <div class="right-fixed-icons">
            <ul>
                <li>
                    <a href="https://api.whatsapp.com/send?phone=919677876445" rel="whatsapp" target="_blank"> <img
                            src="{{asset('assets/whatsapp1.png')}}" width="45" title="whatsapp"
                            alt="whatsapp icon chennai website design company "> </a>
                </li>
                <li>
                    <a href="tel:+919677876445" title="pnumber" rel="pnumber"><img class="border-radius-50" width="40"
                            src="{{asset('assets/phone-call-icon-16.webp')}}" title="call"
                            alt="call icon webdesign company chennai" /> </a>
                </li>
                <!-- <li>
                    <a href="#"><img class="border-radius-50" width="40" src="images/QUOTE-icon-gradient.webp')}}" alt=""/></a>
                </li> -->
        </div>
    </footer>

    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const containerOrder = @json($sectionHtml);    
            const parent = document.querySelector('.sections-container');
    
            const sectionsToCheck = [
                { className: 'payment-terms', id: 'payment-terms' },
                { className: 'logo-section', id: 'logo-section' },
                { className: 'year-of-experience', id: 'year-of-experience' },
                { className: 'recent-projects', id: 'recent-projects' },
                { className: 'google-reviews', id: 'google-reviews' },
                { className: 'seo-package', id: 'seo-package' },
                { className: 'price-package', id: 'price-package' },
                { className: 'payment-terms', id: 'payment-terms' }
            ];
    
            sectionsToCheck.forEach(section => {
                const sectionElement = document.querySelector(`.${section.className}`);
                if (!containerOrder.includes(section.id) && sectionElement) {
                    sectionElement.classList.add('d-none'); 
                }
            });
    
            containerOrder.forEach(containerId => {
                const container = document.getElementById(containerId);
                if (container) {
                    parent.appendChild(container); 
                } else {
                    console.warn(`Container with ID ${containerId} not found`);
                }
            });
        });
    </script>
    
    <script>
        const initSlider = () => {
            const imageList = document.querySelector(".slider-wrapper .image-list");
            const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
            const sliderScrollbar = document.querySelector(".slider-scrollbar");
            const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
            const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
            let autoSlideInterval;

            // Function to auto-slide to the next image
            const autoSlide = () => {
                const scrollAmount = imageList.clientWidth; // Scroll by one image width
                if (imageList.scrollLeft >= maxScrollLeft) {
                    imageList.scrollLeft = 0; // Loop back to the start
                } else {
                    imageList.scrollBy({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                }
            };

            // Start auto-sliding
            const startAutoSlide = () => {
                autoSlideInterval = setInterval(autoSlide, 3000); // Change image every 3 seconds
            };

            // Stop auto-sliding
            const stopAutoSlide = () => {
                clearInterval(autoSlideInterval);
            };

            // Handle scrollbar thumb drag
            scrollbarThumb.addEventListener("mousedown", (e) => {
                stopAutoSlide(); // Stop auto sliding on drag
                const startX = e.clientX;
                const thumbPosition = scrollbarThumb.offsetLeft;
                const maxThumbPosition = sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth;

                const handleMouseMove = (e) => {
                    const deltaX = e.clientX - startX;
                    const newThumbPosition = thumbPosition + deltaX;
                    const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
                    const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

                    scrollbarThumb.style.left = `${boundedPosition}px`;
                    imageList.scrollLeft = scrollPosition;
                };

                const handleMouseUp = () => {
                    document.removeEventListener("mousemove", handleMouseMove);
                    document.removeEventListener("mouseup", handleMouseUp);
                    startAutoSlide(); // Restart auto sliding after dragging
                };

                document.addEventListener("mousemove", handleMouseMove);
                document.addEventListener("mouseup", handleMouseUp);
            });

            // Slide images according to the slide button clicks
            slideButtons.forEach(button => {
                button.addEventListener("click", () => {
                    stopAutoSlide(); // Stop auto sliding on button click
                    const direction = button.id === "prev-slide" ? -1 : 1;
                    const scrollAmount = imageList.clientWidth * direction;
                    imageList.scrollBy({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                    startAutoSlide(); // Restart auto sliding after click
                });
            });

            // Update scrollbar thumb position based on image scroll
            const updateScrollThumbPosition = () => {
                const scrollPosition = imageList.scrollLeft;
                const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth -
                    scrollbarThumb.offsetWidth);
                scrollbarThumb.style.left = `${thumbPosition}px`;
            };

            // Handle slide button visibility
            const handleSlideButtons = () => {
                slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
                slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
            };

            // Call these two functions when image list scrolls
            imageList.addEventListener("scroll", () => {
                updateScrollThumbPosition();
                handleSlideButtons();
            });

            // Stop auto-slide on image hover and restart on mouse out
            const images = imageList.querySelectorAll("img");
            images.forEach(image => {
                image.addEventListener("mouseover", stopAutoSlide);
                image.addEventListener("mouseout", startAutoSlide);
            });

            // Start auto sliding on load
            startAutoSlide();
        };

        // Attach the init function to load and resize events
        // window.addEventListener("resize", initSlider);
        // window.addEventListener("load", initSlider);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Function to truncate text to 200 characters
        function truncateText(selector, maxLength) {
            const elements = document.querySelectorAll(selector);

            elements.forEach((element) => {
                let originalText = element.innerText;

                if (originalText.length > maxLength) {
                    const truncatedText = originalText.slice(0, maxLength) + ' ...';
                    element.innerText = truncatedText;
                }
            });
        }

        // Apply the truncate function to paragraphs with the class 'scrollable-paragraph'
        truncateText('.scrollable-paragraph', 218);
    </script>
    <script>
var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 3,
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true,
    autoplay: {
        delay:2000, // 3 seconds delay for auto-slide
        disableOnInteraction: false, // Do not disable autoplay after interaction
    },
});

// Stop autoplay on hover
document.querySelector('.swiper').addEventListener('mouseenter', function() {
    swiper.autoplay.stop(); // Stop autoplay when hovering over the swiper container
});

// Resume autoplay when hover ends
document.querySelector('.swiper').addEventListener('mouseleave', function() {
    swiper.autoplay.start(); // Resume autoplay when mouse leaves the swiper container
});

    </script>
    <script>
        const carousel = document.querySelector('.carousel');
        const leftArrow = document.getElementById('left');
        const rightArrow = document.getElementById('right');

        // Scroll the carousel forward or backward
        rightArrow.addEventListener('click', () => {
            carousel.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });

        leftArrow.addEventListener('click', () => {
            carousel.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        function autoScroll() {
            const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;

            if (carousel.scrollLeft >= maxScrollLeft) {
                carousel.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });
            } else {
                carousel.scrollBy({
                    left: 300,
                    behavior: 'smooth'
                });
            }
        }

        let autoScrollInterval = setInterval(autoScroll, 3000);

        leftArrow.addEventListener('click', () => {
            clearInterval(autoScrollInterval);
            autoScrollInterval = setInterval(autoScroll, 3000);
        });

        rightArrow.addEventListener('click', () => {
            clearInterval(autoScrollInterval);
            autoScrollInterval = setInterval(autoScroll, 3000);
        });
    </script>

</body>

</html>