<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Admin Reg</title>



<!-- Custom styles for this template -->
<link href="{{asset('assets/images/icon/favicon.ico')}}" rel="stylesheet">
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">


<link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<!-- amchart css -->
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<!-- others css -->
<link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    

</head>
<body>
    
    @if($errors->any())
    @foreach($errors->all() as $error)
     <div class="alert alert-danger m-4">
     {{$error}}
     </div>
    @endforeach
    @endif

     <!-- Register area start -->
     <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
    
    
                <form action="{{route('admin.register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="login-form-head">
                        <h4>Register Super Admin</h4>
                        
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1">Full Name</label>
                            <input type="text"  name="name" value="{{old('name')}}" id="exampleInputName1">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" value="{{old('email')}}" id="exampleInputEmail1">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
    
                        <div class="mb-3">
                            <label for="slider_image" class="form-label text-black h6">Profile Image</label>
                            <input type="file" name="image" class="form-control" id="slider_image" aria-describedby="PriceHelp">
                            
                          </div>
    
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="exampleInputPassword1">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="exampleInputPassword2">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        
                            </div>
                        </div>
                      
                    </div>
                </form>
    
    
            </div>
        </div>
    </div>
    <!-- login area end -->
    
    
    
</body>
</html>




