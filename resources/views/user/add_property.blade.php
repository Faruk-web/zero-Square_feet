@extends('layouts.user.layout')
<style>
    #hover:hover {
            background-color:white;
            color:black;
            
        }
        .hover{
            margin-left: 103px;
        }
</style>
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection

@section('user-content')
@php
    $topbar_contact=App\ContactUs::first();
  
@endphp
<!--=====BANNER START=====-->
<!-- Modal -->

 <!--=====SERVICE START=====-->
  @php
    $service_section=$sections->where('id',6)->first();
@endphp
@if ($service_section->show_homepage==1)
  <section class="wsus__services" style="background: url({{ asset($service_bg->image) }});">
    <div class="wsus__services_overlay pt_100 xs_pt_75 pb_75 xs_pb_50">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-4">
            <div class="wsus__services_heading">
              <div class="wsus__section_heading">
                <h2 class="text-white">Rent or Sell 
                               Property Online</h2>
                <span class="text-white">Looking to sell property online or are you in search of tenants?
                Do it with ease with the largest real estate marketplace in
                Bangladesh. Start your journey now!</span>
                <div class="hover">
                <button   class="btn btn-success " id ="hover" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 22px;"> </i> Get Started</button>
                </div>
              </div>
             
            </div>
          </div>
          <div class="col-xl-7 col-lg-8">
            <div class="row">
                @foreach ($services->take($service_section->content_quantity) as $service_item)
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__single_service">
                        <i class="{{ $service_item->icon }}"></i>
                        <h4>{{ $service_item->name }}</h4>
                        <p>{{ $service_item->description }}</p>
                        <span><i class="fas fa-flower"></i></span>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif

  <!--=====BLOG START=====-->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="text-color" style="margin-left: 130px;">Submit Request</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6 style="margin-left: 73px;">Please provide all the necessary information</h6>
        <h6 style="margin-left: 59px;">below for a more efficient and effective service.</h6>
        <div class="wsus__login_form ">
            <form action="{{ route('property.client.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                <label class="lbl">Name<sup>*</sup></label>
                 <input class="form-control form-control-lg" type="text" name="name" id="regName" placeholder="Name">
                </div><br>
                <div class="form-group mt-2">
                <label class="lbl">Email<sup>*</sup></label>
                  <input class="form-control form-control-lg" type="email" id="regEmail" name="email" placeholder="Email">
                </div><br>
                <div class="form-group mt-2">
                 <label class="lbl">Phone<sup>*</sup></label>
                  <input class="form-control form-control-lg" type="text" id="regPassword" name="phone" placeholder="phone">
                </div><br>
                <button type="submit" class="btn btn-primary" style="margin-left:298px;font-size: 18px;">Save</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

  @php
  $top_property_section=$sections->where('id',3)->first();
@endphp

@if ($top_property_section->show_homepage==1)
  <!--=====NEW PROPERTIES END=====-->
  <section class="wsus__new_properties pt_30 xs_pt_65 pb_75 xs_pb_50  xs_mt_75">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="wsus__section_heading text-center mb_60">
            <h2>{{ $top_property_section->header }}</h2>
            <!--<span>{{ $top_property_section->description }}</span>-->
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($properties->where('top_property',1)->take($top_property_section->content_quantity) as $top_item)
        @if ($top_item->expired_date==null)
        <div class="col-xl-4 col-md-6">
          <div class="wsus__single_property">
            <div class="wsus__single_property_img">
              <img src="{{ asset($top_item->thumbnail_image) }}" alt="properties" class="img-fluid w-100">

                @if ($top_item->property_purpose_id==1)
                <span class="sale">{{ $top_item->propertyPurpose->custom_purpose }}</span>

                @elseif($top_item->property_purpose_id==2)
                <span class="sale">{{ $top_item->propertyPurpose->custom_purpose }}</span>
                @endif

                @if ($top_item->urgent_property==1)
                    <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                @endif

            </div>
            <div class="wsus__single_property_text">
                @if ($top_item->property_purpose_id==1)
                    <span class="tk">{{ $currency->currency_icon }}{{ $top_item->price }}</span>
                @elseif ($top_item->property_purpose_id==2)
                <span class="tk">{{ $currency->currency_icon }}{{ $top_item->price }} /
                    @if ($top_item->period=='Daily')
                    <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                    @elseif ($top_item->period=='Monthly')
                    <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                    @elseif ($top_item->period=='Yearly')
                    <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                    @endif
                </span>
                @endif

                <a href="{{ route('property.details',$top_item->slug) }}" class="title w-100">{{ $top_item->title }}</a>
                <p class="mb-2"> {{ $top_item->address.', '. $top_item->city->name.', '.$top_item->city->countryState->name.', '.$top_item->city->countryState->country->name }}</p>
                
                <ul class="d-flex flex-wrap justify-content-between">
                    <li><i class="fal fa-bed"></i> {{ $top_item->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                    <li><i class="fal fa-shower"></i> {{ $top_item->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                    <li><i class="fal fa-draw-square"></i> {{ $top_item->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                </ul>
                <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                <a class="btn btn-success" href="tel:{{$topbar_contact->topbar_phone }}"> <i style="padding-right="3px" class="fas fa-phone"></i> Call Now</a>
                
                <button  onclick="sendEmail('{{ $top_item->id}}', '{{ $top_item->title}}')" class="btn btn-success"> <i class="fas fa-envelope"></i> Email</button>
                
             {{--   @php
                    $total_review=$top_item->reviews->where('status',1)->count();
                    if($total_review > 0){
                        $avg_sum=$top_item->reviews->where('status',1)->sum('avarage_rating');

                        $avg=$avg_sum/$total_review;
                        $intAvg=intval($avg);
                        $nextVal=$intAvg+1;
                        $reviewPoint=$intAvg;
                        $halfReview=false;
                        if($intAvg < $avg && $avg < $nextVal){
                            $reviewPoint= $intAvg + 0.5;
                            $halfReview=true;
                        }
                    }
                @endphp

                @if ($total_review > 0)
                  <span class="rating">{{ sprintf("%.1f", $reviewPoint) }}

                    @for ($i = 1; $i <=5; $i++)
                        @if ($i <= $reviewPoint)
                            <i class="fas fa-star"></i>
                        @elseif ($i> $reviewPoint )
                            @if ($halfReview==true)
                            <i class="fas fa-star-half-alt"></i>
                                @php
                                    $halfReview=false
                                @endphp
                            @else
                            <i class="fal fa-star"></i>
                            @endif
                        @endif
                    @endfor
                  </span>
                @else
                    <span class="rating">0.0
                        @for ($i = 1; $i <=5; $i++)
                        <i class="fal fa-star"></i>
                        @endfor
                    </span>
                @endif
                --}}
                </div>
            </div>
          </div>
        </div>
        @elseif($top_item->expired_date >= date('Y-m-d'))
            <div class="col-xl-4 col-md-6">
                <div class="wsus__single_property">
                <div class="wsus__single_property_img">
                    <img src="{{ asset($top_item->thumbnail_image) }}" alt="properties" class="img-fluid w-100">

                    @if ($top_item->property_purpose_id==1)
                    <span class="sale">{{ $top_item->propertyPurpose->custom_purpose }}</span>

                    @elseif($top_item->property_purpose_id==2)
                    <span class="sale">{{ $top_item->propertyPurpose->custom_purpose }}</span>
                    @endif

                    @if ($top_item->urgent_property==1)
                        <span class="rent">{{ $websiteLang->where('lang_key','urgent')->first()->custom_text }}</span>
                    @endif

                </div>
                <div class="wsus__single_property_text">
                    @if ($top_item->property_purpose_id==1)
                        <span class="tk">{{ $currency->currency_icon }}{{ $top_item->price }}</span>
                    @elseif ($top_item->property_purpose_id==2)
                    <span class="tk">{{ $currency->currency_icon }}{{ $top_item->price }} /
                        @if ($top_item->period=='Daily')
                        <span>{{ $websiteLang->where('lang_key','daily')->first()->custom_text }}</span>
                        @elseif ($top_item->period=='Monthly')
                        <span>{{ $websiteLang->where('lang_key','monthly')->first()->custom_text }}</span>
                        @elseif ($top_item->period=='Yearly')
                        <span>{{ $websiteLang->where('lang_key','yearly')->first()->custom_text }}</span>
                        @endif
                    </span>
                    @endif

                    <a href="{{ route('property.details',$top_item->slug) }}" class="title w-100">{{ $top_item->title }}</a>
                    <ul class="d-flex flex-wrap justify-content-between">
                        <li><i class="fal fa-bed"></i> {{ $top_item->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                        <li><i class="fal fa-shower"></i> {{ $top_item->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                        <li><i class="fal fa-draw-square"></i> {{ $top_item->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                    </ul>
                    <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                        <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $top_item->propertyType->id]) }}" class="category">{{ $top_item->propertyType->type }}</a>

                    @php
                        $total_review=$top_item->reviews->where('status',1)->count();
                        if($total_review > 0){
                            $avg_sum=$top_item->reviews->where('status',1)->sum('avarage_rating');

                            $avg=$avg_sum/$total_review;
                            $intAvg=intval($avg);
                            $nextVal=$intAvg+1;
                            $reviewPoint=$intAvg;
                            $halfReview=false;
                            if($intAvg < $avg && $avg < $nextVal){
                                $reviewPoint= $intAvg + 0.5;
                                $halfReview=true;
                            }
                        }
                    @endphp

                    @if ($total_review > 0)
                        <span class="rating">{{ sprintf("%.1f", $reviewPoint) }}

                        @for ($i = 1; $i <=5; $i++)
                            @if ($i <= $reviewPoint)
                                <i class="fas fa-star"></i>
                            @elseif ($i> $reviewPoint )
                                @if ($halfReview==true)
                                <i class="fas fa-star-half-alt"></i>
                                    @php
                                        $halfReview=false
                                    @endphp
                                @else
                                <i class="fal fa-star"></i>
                                @endif
                            @endif
                        @endfor
                        </span>
                    @else
                        <span class="rating">0.0
                            @for ($i = 1; $i <=5; $i++)
                            <i class="fal fa-star"></i>
                            @endfor
                        </span>
                    @endif
                    </div>
                </div>
                </div>
          </div>
        @endif
        @endforeach
      </div>
    </div>
  </section>
  <!--=====NEW PROPERTIES END=====-->
@endif



  <!--=====POPULAR PROPERTIES START=====-->
  @php
$feature_property=$sections->where('id',4)->first();
@endphp
@if ($feature_property->show_homepage==1)
  <section class="wsus__popular_properties mt_90 xs_mt_65">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="wsus__section_heading text-center mb_60">
            <h2>{{ $feature_property->header }}</h2>
            <!--<span>{{ $feature_property->description }}</span>-->
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($properties->where('is_featured',1)->take($feature_property->content_quantity) as $featured_item)
        @if ($featured_item->expired_date==null)
        <div class="col-xl-4 col-md-6">
          <div class="wsus__popular_properties_single">
            <img src="{{ asset($featured_item->thumbnail_image) }}" alt="popular properties">
            <a href="{{ route('property.details',$featured_item->slug) }}" class="wsus__popular_text">
              <h4>{{ $featured_item->title }}</h4>
              <ul class="d-flex flex-wrap mt-3">
                <li><i class="fal fa-bed"></i> {{ $featured_item->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                <li><i class="fal fa-shower"></i> {{ $featured_item->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                <li><i class="fal fa-draw-square"></i> {{ $featured_item->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
              </ul>
            </a>
          </div>
        </div>
        @elseif($featured_item->expired_date >= date('Y-m-d'))
            <div class="col-xl-4 col-md-6">
                <div class="wsus__popular_properties_single">
                <img src="{{ asset($featured_item->thumbnail_image) }}" alt="popular properties">
                <a href="{{ route('property.details',$featured_item->slug) }}" class="wsus__popular_text">
                    <h4>{{ $featured_item->title }}</h4>
                    <ul class="d-flex flex-wrap mt-3">
                    <li><i class="fal fa-bed"></i> {{ $featured_item->number_of_bedroom }} {{ $websiteLang->where('lang_key','bed')->first()->custom_text }}</li>
                    <li><i class="fal fa-shower"></i> {{ $featured_item->number_of_bathroom }} {{ $websiteLang->where('lang_key','bath')->first()->custom_text }}</li>
                    <li><i class="fal fa-draw-square"></i> {{ $featured_item->area }} {{ $websiteLang->where('lang_key','sqft_s')->first()->custom_text }}</li>
                    </ul>
                </a>
                </div>
            </div>
        @endif
        @endforeach
      </div>
    </div>
  </section>
   @endif
  <!--=====POPULAR PROPERTIES END=====-->
<!--=====TESTIMONIAL START=====-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });

</script>
@endsection
