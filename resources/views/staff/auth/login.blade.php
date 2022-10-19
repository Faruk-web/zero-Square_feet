@include('layouts.staff.header')
<body id="page-top" class="body_bg">
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg mt_100">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image:url({{ $image->image ? url($image->image) :'' }});"></div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ $websiteLang->where('lang_key','staff_login')->first()->custom_text }}</h1>
                                </div>
                                <form class="user" id="staffLoginForm">
                                    @csrf
                                    <div class="form-group">
                                        <input id="exampleInputEmail" type="email" name="email" class="form-control form-control-user"
                                            placeholder="{{ $websiteLang->where('lang_key','email')->first()->custom_text }}" value="{{ env('PROJECT_MODE')==0 ? 'staff@gmail.com' : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="{{ $websiteLang->where('lang_key','pass')->first()->custom_text }}" value="{{ env('PROJECT_MODE')==0 ? 1234 : '' }}">
                                    </div>
                                    <button type="button" id="staffLoginBtn" class="btn btn-primary btn-user btn-block">
                                        {{ $websiteLang->where('lang_key','login')->first()->custom_text }}
                                    </button>
                                    <hr>
                                </form>
                                <div class="text-center">
                                    <a class="small" href="{{ route('staff.forget.password') }}">{{ $websiteLang->where('lang_key','forget_your_pass')->first()->custom_text }}</a>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</body>

<script>
    (function($) {
    "use strict";
    $(document).ready(function () {
        $("#staffLoginBtn").on('click',function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('staff.login') }}",
                type:"post",
                data:$('#staffLoginForm').serialize(),
                success:function(response){
                    if(response.success){
                        window.location.href = "{{ route('staff.dashboard')}}";
                        toastr.success(response.success)
                    }
                    if(response.error){
                        toastr.error(response.error)

                    }
                },
                error:function(response){
                    if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                    if(response.responseJSON.errors.password)toastr.error(response.responseJSON.errors.password[0])

                }

            });


        })


        $(document).on('keyup', '#exampleInputEmail, #exampleInputPassword', function (e) {
            if(e.keyCode == 13){
                e.preventDefault();

                $.ajax({
                url: "{{ route('staff.login') }}",
                type:"post",
                data:$('#staffLoginForm').serialize(),
                success:function(response){
                    if(response.success){
                        window.location.href = "{{ route('staff.dashboard')}}";
                        toastr.success(response.success)
                    }
                    if(response.error){
                        toastr.error(response.error)

                    }
                },
                error:function(response){
                    if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                    if(response.responseJSON.errors.password)toastr.error(response.responseJSON.errors.password[0])

                }

            });


            }

        })

    });

    })(jQuery);
</script>
@include('layouts.staff.footer')

