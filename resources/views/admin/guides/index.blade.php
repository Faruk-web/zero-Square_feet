@extends('layouts.admin.layout')
@section('title')
<title>{{  $websiteLang->where('lang_key','custom_page')->first()->custom_text }}</title>
@endsection
@section('admin-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.custom-page.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Area Guides</a></h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Area Guides From</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.guides.area.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="page_name">Title</label>
                            <input type="text" name="title" class="form-control" id="title" >
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="page_name">Area Guides Image</label>
                                    <input type="file" name="area_image" class="form-control" id="page_name" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="page_name">Features Image</label>
                                    <input type="file" name="features_image" class="form-control" id="page_name" >
                                </div>
                            </div>
                       </div>
                       <div class="form-group">
                            <label for="seo_title">Main Area</label>
                            <select type="file" name="main_area_id" class="form-control" id="page_name">
                            <option>----Select Option---</option>
                            @foreach($areaguides as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Area Details</label>
                            <textarea class="summernote" id="summernote" name="area_details"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
