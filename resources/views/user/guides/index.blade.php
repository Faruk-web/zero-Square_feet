@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection

@section('user-content')
<style>
    .search-box{
        margin-left:294px;
        /* background-color: green; */
        /* margin: -1px; */
        margin-right:250px;
    }
</style>
  <!--===BREADCRUMB PART START====-->
  <section class="wsus__breadcrumb" style="background: url({{asset('uploads/areaguides/'.$banner_image->image) }});">
    <div class="wsus_bread_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4>Discover Bangladesh!</h4>
                    <nav style="--bs-breadcrumb-divider: '-';margin: 100px;" aria-label="breadcrumb">
                    <div class="row large_subscribe_search">
                        <div class="col-xl-3 col-lg-4">
                            <div class="large_subscribe_search_text">
                                <h4 class="">Search Location</h4>
                            </div>
                        </div>
                        <div class="col-xl-9 pe-0 col-lg-8">
                            <form id="guides">
                            <input type="text" placeholder="Location" name="Location" id="guides_search">
                            <button id="guides" type="submit"><i  class="loading-icon fa fa-spin fa-spinner d-none mt-1"></i>  <i id="guides" class="fal fa-angle-right"></i></button>
                            </form>
                        </div>
                    </div>
                     <!--===BREADCRUMB PART START====-->
                           <div class="row search-box" id="guides_show_info">
                                <div class="col-12 text-center">
                                    <h4 id="project_name"> </h4>
                                    <nav style="--bs-breadcrumb-divider: '-';margin: 100px;" aria-label="breadcrumb">
                                    </nav>
                                </div>
                            </div>
                        
                <!--===BREADCRUMB PART END====-->
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
        <h4>{{$banner_image->name}}</h4>
      <div class="row" id="products_load_with_ajax">
            @foreach($areaguides as $items)
                <div class="col-xl-4 col-md-6">
                    <div class="wsus__single_blog">
                        <a href="{{url('/area/guides/gallery/'.$items->id)}}" class="blog_title">
                            <div class="wsus__blog_img">
                                <img src="{{ asset('uploads/areaguides/'.$items->area_image) }}" alt="blog items" class="img-fluid w-100">
                            </div>
                        </a>
                        <div class="wsus__blog_text">
                        <div class="wsus__blog_header d-flex flex-wrap align-items-center justify-content-between">
                            <div class="blog_header_images d-flex flex-wrap align-items-center w-100">
                            </div>
                        </div>
                        <a href="{{url('/area/guides/gallery/'.$items->id)}}" class="blog_title">{{$items->title}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12 text-center">
                <!-- <div class="loading_img_section d-block text-center"><img  src="https://i.gifer.com/4V0b.gif" alt="" style="height:10px;"></div> -->
                    <button type="button" class="btn btn-secondary"><a href="" class="blog_title" style="color:white">See Nore..</a></button>  
                </div>
      </div>
      
 <!-- Popular products End -->
    </div>
  </section>
  <!--=====BLOG END=====-->
  <script>
     // Begin:: project Search for
     $('#guides_search').keyup(function () {
        var guides_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search/guides',
            data: {
                'guides_info': guides_info
            },
            success: function (data) {
                console.log("Hello world!");
                $('#guides_show_info').html(data);
            }
        });
    });
    function setguidesInfo(title, area_details) {
    $('#project_name').val(title);
    $('#project_code').val(area_details);
    $('#modal_close').click();
    success("project Info set Successfully.");
}
    // Begin:: members Search for
</script>
<script>
    function loadMoreData(page){
           $.ajax({
               url:'?page='+page,
               type:'get',
               beforeSend:function(){
                   $('.loading_img_section').show();
               }
           })
           .done(function(response){
            
               if(response.data.length == 0){
                   $('.loading_img_section').html('');
                   return;
               }



               $('.loading_img_section').hide();
               var loadData='';
               
               $.each(response.data,function(index,value){
                   console.log(value)
                 loadData+= `
                            <div class="col-xl-4 col-md-6">
                                <div class="wsus__single_blog">
                                    <a href="{{url('/area/guides/gallery/'.$items->id)}}" class="blog_title">
                                        <div class="wsus__blog_img">
                                            <img src="/${value.product_thambnail}" alt="blog items" class="img-fluid w-100">
                                        </div>
                                    </a>
                                    <div class="wsus__blog_text">
                                    <div class="wsus__blog_header d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="blog_header_images d-flex flex-wrap align-items-center w-100">
                                        </div>
                                    </div>
                                    <a href="/area/guides/gallery/${value.id}" class="blog_title">${value.product_name}</a>
                                    </div>
                                </div>
                            </div>
                            `
                        })
                        $('#products_load_with_ajax').append(loadData);
                    })
                    .fail(function(jqXHR,ajaxOptions,thrownError){
                        alert('Server not responding...');
                    })


                }

    var pages=1;

       $(window).scroll(function(){
        if(screen.width <= 600){
            if($(window).scrollTop() + $(window).height() >= $(document).height() - 1400){
            pages++;
               loadMoreData(pages);
           }
        }
        else{
            if($(window).scrollTop() + $(window).height() >= $(document).height() - 700){
            console.log('Hit')
            pages++;
               loadMoreData(pages);
           }
        }
       })
</script>
@endsection
