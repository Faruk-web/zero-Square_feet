@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection

@section('user-content')

  <!--===BREADCRUMB PART START====-->
  <section class="wsus__breadcrumb" style="background: url({{asset('uploads/areaguides/'.optional($areaguides)->area_image) }});">
    <div class="wsus_bread_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4> {{optional($areaguides)->title}}!</h4>
                    <nav style="--bs-breadcrumb-divider: '-';margin: 100px;" aria-label="breadcrumb">
                  
                    </nav>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--===BREADCRUMB PART END====-->
  <!--=====BLOG START=====-->
  <section class="wsus__blog mt_45 mb_45">
    <div class="container">
        <h4>Location: {{optional($areaguides)->title}}</h4>
      <div class="row">

            <div class="col-12 text-center">
                   <div class="wsus__single_blog">
                        <a href="" class="blog_title">
                            <div class="wsus__blog_img" style="width: 1081px; height: 300px;">
                                <img src="{{ asset('uploads/areaguides/'.optional($areaguides)->features_image) }}" alt="blog items" class=" w-300">
                            </div>
                        </a>
                        <div class="wsus__blog_text">
                        <div class="wsus__blog_header d-flex flex-wrap align-items-center justify-content-between">
                            <div class="blog_header_images d-flex flex-wrap align-items-center w-100">
                            </div>
                        </div>
                        <h4>ABOUT {{optional($areaguides)->title}}</h4>
                        <p>{{optional($areaguides)->area_details}}</p>
                        </div>
                    </div>
            </div>
    
      </div>
    </div>
  </section>
  <!--=====BLOG END=====-->
@endsection
