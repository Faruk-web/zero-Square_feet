@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection

@section('user-content')
  <!--===BREADCRUMB PART START====-->
  <section class="wsus__breadcrumb" style="background: url({{asset('uploads/areaguides/'.$banner_image->guides_image) }});">
    <div class="wsus_bread_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4>Bproperty Real Estate Solutions</h4>
                    <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                        <h2 style="color:white">What are you interested in?</h2><br>
                       <ol class="breadcrumb">
                            <li class="breadcrumb-item"><button type="button" class="btn btn-success"><a href="{{route('buy.guides')}}">BUYING A PROPERTY</a></button></li>
                            <li class="breadcrumb-item active" aria-current="page"><button type="button" class="btn btn-success"><a href="{{route('sales.guides')}}">SALLING A PROPERTY</a></button></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--===BREADCRUMB PART END====-->
@endsection
