<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Branch login</title>



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
    

 <!-- login area start -->

 @if($errors->any())
@foreach($errors->all() as $error)
 <div class="alert alert-danger m-4">
 {{$error}}
 </div>
@endforeach
@endif

<div class="main-content-inner">

    @if (session('message'))
    <div class="alert mt-3 alert-{{session('type')}}">
      {{session('message')}}
    </div>
@endif


 <br>
 <br>
 <br>
 <br>
 <div class="mt-5">
     
 <div class="container p-3 ">
    <div class="h5 text-center bg-info text-white py-3 mb-3">Branch Login.</div>

      <form action="{{route('admin.branch.login')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="mb-3">
           <label for="exampleInputEmail1" class="form-label">Branch Name</label>
           <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
           {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
         </div>
 
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Password</label>
           <input type="password" name="password" class="form-control" id="exampleInputPassword1">
         </div>
 
         <div class="mb-3">
           <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
           <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
         </div>
 
         <div class="mb-3 form-check">
           <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
           <label class="form-check-label" for="exampleCheck1">Remember</label>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
       </form>
 </div>
 </div>
 
    
    
    
</body>
</html>




