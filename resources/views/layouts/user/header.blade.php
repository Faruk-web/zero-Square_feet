@php
    $topbar_contact=App\ContactUs::first();
    $setting=App\Setting::first();
    $customPages=App\CustomPage::all();
    $navigations=App\Navigation::all();
    $websiteLang=App\ManageText::all();
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    @yield('title')
    @yield('meta')


    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;900&family=Poppins:wght@400;500;600;900&display=swap" rel="stylesheet">

  <link rel="icon" type="image/png" href="{{ url($setting->favicon) }}">
  <link rel="stylesheet" href="{{ asset('user/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/spacing.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/add_row_custon.css') }}">


  <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}">

  @if ($setting->text_direction=="RTL")
    <link rel="stylesheet" href="{{ asset('user/css/rtl.css') }}">
  @endif

  <link rel="stylesheet" href="{{ asset('user/css/dev.css') }}">

  <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

  @include('user.theme_style')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user/js/sweetalert2@11.js') }}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    @if ($setting->google_analytic==1)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $setting->google_analytic_code }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $setting->google_analytic_code }}');
    </script>
    @endif

</head>

<body>
    
    
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:black;color:white">
        <h5 class="modal-title" id="modal_poperty_title"></h5>
        <button style="background-color:white !important;color:white !important" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form  action="/user/send/email" method="post">
         <!--<form id="listingAuthContactForm" action="/user/send/email" method="post">-->
            @csrf
            <div class="wsus__sidebar_input">
                <label><span class="text-danger">*</span>Name</label>
                <input class="form-control" type="text" name="name" required>
                <input class="form-control modal_poperty_id" type="hidden" name="poperty_id" id="modal_poperty_id" required>
            </div>
            <br>
            <div class="wsus__sidebar_input">
                <label> <span class="text-danger">*</span>Email</label>
                <input class="form-control" type="email" name="email" required>
            </div>
            <br>
            <div class="wsus__sidebar_input">
                <label><span class="text-danger">*</span>Phone</label>
                <input class="form-control" type="text" name="phone" required>
            </div>
            <br>
            <div class="wsus__sidebar_input">
                <label>Discription</label>
               <textarea class="form-control" cols="3" rows="3" name="message"></textarea>
            </div>
                   

             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Send Email</button>
      </div>
         </form>
    </div>
  </div>
  
  
  
</div>
  <!--=====TOPBAR START=====-->
  <section class="wsus__topbar" style="background-color:black !important">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-12 col-sm-8">
          <ul class="wsus__topbar_left d-flex align-items-center">
            <li><a href="tel:{{ $topbar_contact->topbar_phone }}"><i class="fal fa-mobile"></i> {{ $topbar_contact->topbar_phone }}</a></li>
            <li><a href="mailto:{{ $topbar_contact->topbar_email }}"><i class="fas fa-envelope"></i> {{ $topbar_contact->topbar_email }}</a></li>
          </ul>
        </div>
        <div class="col-xl-6 col-sm-4 d-none d-sm-block">
          <ul class="wsus__topbar_right d-flex justify-content-end align-items-center">
                @if ($topbar_contact->facebook)
                <li><a href="{{ $topbar_contact->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                @endif
                @if ($topbar_contact->twitter)
                <li><a href="{{ $topbar_contact->twitter }}"><i class="fab fa-twitter"></i></a></li>
                @endif
                @if ($topbar_contact->linkedin)
                <li><a href="{{ $topbar_contact->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                @endif
                @if ($topbar_contact->instagram)
                <li><a href="{{ $topbar_contact->instagram }}"><i class="fab fa-instagram"></i></a></li>
                @endif
                @if ($topbar_contact->youtube)
                <li><a href="{{ $topbar_contact->youtube }}"><i class="fab fa-youtube"></i></a></li>
                @endif
            </ul>
        </div>
      </div>
    </div>
  </section>
  <!--=====TOPBAR END=====-->


  <!--=====MAIN MENU START=====-->
  <nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ url($setting->logo) }}" alt="logo" style="width: 100px !important;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fal fa-align-right"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">

            @php
                $home_menu=$navigations->where('id',1)->first();
            @endphp
            @if ($home_menu->status==1)
            <li class="nav-item">
                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">{{ $home_menu->navbar }}</a>
            </li>
            @endif
      
            <!-- @php
                $home_menu=$navigations->where('id',1)->first();
            @endphp
            @if ($home_menu->status==1)
            <li class="nav-item">
                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">{{ $home_menu->navbar }}</a>
            </li>
            @endif -->
             @php
                $home_menu=$navigations->where('id',1)->first();
            @endphp
            @if ($home_menu->status==1)
            <li class="nav-item">
                <a class="nav-link {{ Route::is('add.property') ? 'active' : '' }}" aria-current="page" href="{{ url('/add_property') }}">{{ $home_menu->add_property }}</a>
            </li>
            @endif
            @php
                $about_menu=$navigations->where('id',4)->first();
            @endphp
            @if ($about_menu->status==1)
            <li class="nav-item">
                <a class="nav-link {{ Route::is('about.us') ? 'active' : '' }}" href="{{ route('about.us') }}">{{ $about_menu->navbar }}</a>
            </li>
            @endif

            @php
                $property_menu=$navigations->where('id',2)->first();
            @endphp
            @if ($property_menu->status==1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Route::is('properties') || Route::is('agents') ? 'active' : '' }}" href="javascript:;" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ $property_menu->navbar }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @php
                            $all_property_menu=$navigations->where('id',3)->first();
                        @endphp
                        @if ($all_property_menu->status==1)
                        <li><a class="dropdown-item" href="{{ route('properties',['page_type' => 'list_view']) }}">{{ $all_property_menu->navbar }}</a></li>
                        @endif

                        @php
                            $featured_property_menu=$navigations->where('id',19)->first();
                        @endphp

                        @if ($featured_property_menu->status==1)
                        <li><a class="dropdown-item" href="{{ route('properties',['page_type' => 'list_view','sorting_id'=>3]) }}">{{ $featured_property_menu->navbar }}</a></li>
                        @endif

                        @php
                            $top_property_menu=$navigations->where('id',20)->first();
                        @endphp
                        @if ($top_property_menu->status==1)
                        <li><a class="dropdown-item" href="{{ route('properties',['page_type' => 'list_view','sorting_id'=>4]) }}">{{ $top_property_menu->navbar }}</a></li>
                        @endif

                        @php
                            $urgent_property_menu=$navigations->where('id',21)->first();
                        @endphp
                        @if ($urgent_property_menu->status==1)
                        <li><a class="dropdown-item" href="{{ route('properties',['page_type' => 'list_view','sorting_id'=>6]) }}">{{ $urgent_property_menu->navbar }}</a></li>
                        @endif
                       {{-- @php
                            $agent_menu=$navigations->where('id',6)->first();
                        @endphp
                        @if ($agent_menu->status==1)
                        <li><a class="dropdown-item" href="{{ route('agents') }}">{{ $agent_menu->navbar }}</a></li>
                        @endif --}}

                    </ul>
                </li>
            @endif
            
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Route::is('properties') || Route::is('agents') ? 'active' : '' }}" href="javascript:;" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">Guides
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              
                        <li><a class="dropdown-item" href="{{ route('guides.index') }}">Area Guides</a></li>
  

                        <li><a class="dropdown-item" href="{{ route('sale.buy.guides')}}">Sale/Buy Guides</a></li>
  
                        <li><a class="dropdown-item" href="{{ route('loan.calculation')}}">Loan Calculater</a></li>
                    </ul>
                </li>
           {{--  @php
                $pricing_menu=$navigations->where('id',5)->first();
            @endphp
            @if ($pricing_menu->status==1)
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('pricing.plan') ? 'active' : '' }}" href="{{ route('pricing.plan') }}">{{ $pricing_menu->navbar }}</a>
                </li>
            @endif
        --}}
            @php
                $pages_menu=$navigations->where('id',18)->first();
            @endphp
            @if ($pages_menu->status==1)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Route::is('blog') || Route::is('blog.details') || Route::is('custom.page') || Route::is('faq') ? 'active' : '' }}" href="javascript:;" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ $pages_menu->navbar }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                {{--    @php
                        $faq_menu=$navigations->where('id',17)->first();
                    @endphp
                    @if ($faq_menu->status==1)
                    <li><a class="dropdown-item {{ Route::is('faq') ? 'active' : '' }}" href="{{ route('faq') }}">{{ $faq_menu->navbar }}</a></li>
                    @endif
                --}}
                    @php
                        $blog_menu=$navigations->where('id',7)->first();
                    @endphp
                    @if ($blog_menu->status==1)
                    <li>
                        <a class="dropdown-item {{ Route::is('blog') || Route::is('blog.details') ? 'active' : '' }}" href="{{ route('blog') }}">{{ $blog_menu->navbar }}</a>
                    </li>
                    @endif

                  {{--  @if ($customPages->count() !=0)
                        @foreach ($customPages as $custom_item)
                            <li><a class="dropdown-item {{  Request::url() == route('custom.page',$custom_item->slug) ? 'active' : '' }}" href="{{ route('custom.page',$custom_item->slug) }}">{{ $custom_item->page_name }}</a></li>
                        @endforeach
                    @endif --}}
                </ul>
            </li>
            @endif


            @php
                $contact_menu=$navigations->where('id',8)->first();
            @endphp
            @if ($contact_menu->status==1)
            <li class="nav-item">
                <a class="nav-link {{ Route::is('contact-us')? 'active' : '' }}" href="{{ route('contact.us') }}">{{  $contact_menu->navbar }}</a>
            </li>
            @endif

        </ul>

        @php
            $my_account =$navigations->where('id',22)->first();
        @endphp
        @if ($my_account ->status==1)
            <ul class="login_icon ms-auto">
                <li><a href="{{ route('user.dashboard') }}"><i class="fal fa-user-circle"></i> {{ $my_account->navbar }}</a>
                </li>
            </ul>
        @endif
      </div>
    </div>
  </nav>
  <!--=====MAIN MENU END=====-->
