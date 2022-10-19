@extends('layouts.admin.layout')
@section('title')
<title>{{  $websiteLang->where('lang_key','custom_page')->first()->custom_text }}</title>
@endsection
@section('admin-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.guides.sales.buy.store') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Area Guides</a></h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sale/Buy Guides From</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.guides.sales.buy.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="page_name">Titele</label>
                            <input type="text" name="title" class="form-control" id="page_name" >
                        </div>
                        <div class="form-group">
                            <label for="page_name">Serial Number</label>
                            <input type="number" name="number" class="form-control" id="page_name" >
                        </div>
                        <div class="form-group">
                            <label for="page_name">Area Guides Image</label>
                            <input type="file" name="guides_image" class="form-control" id="page_name" >
                        </div>
                        <div class="form-group">
                            <label for="description">Area Details</label>
                            <textarea class="summernote" id="summernote" name="area_details"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="seo_title">Sales / Buy</label>
                            <select type="file" name="sale_buy" class="form-control" id="page_name">
                            <option>----Select Option---</option>
                            <option value="Sale">Sale</option>
                            <option value="Buy">Buy</option>
                            </select>
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
