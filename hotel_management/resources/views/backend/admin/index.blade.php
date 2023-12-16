@extends('backend.layout.master')

@section('main_content')
   
  
<h5 class="card-title text-center my-2 border p-3 ">Dashboard Overview</h5>
<div class="d-flex justify-content-center">

<div class="d-flex flex-row flex-wrap justify-content-center mt-3">

<div class="card my-2 mx-2" style="width: 18rem;">
    <div class="card-body bg-dark text-white">
      <h5 class="card-title text-center">Today's Collections</h5>
      {{--  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>  --}}
     <a href="{{}}"> <p class="card-text text-center text-white">{{}}</p></a>
    
    </div>
  </div>


<div class="card my-2 mx-2" style="width: 18rem;">
    <div class="card-body bg-primary text-white">
      <h5 class="card-title text-center ">Contact Messages</h5>
      {{--  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>  --}}
     <a href="{{}}"> <p class="card-text text-center text-white">{{}}</p></a>
     
    </div>
  </div>







</div>

</div>

@endsection
