
@extends('backend.layout.master')
@section('main_content')

@if($errors->any())
@foreach($errors->all() as $error)
 <div class="alert alert-danger m-4">
 {{$error}}
 </div>
@endforeach
@endif



</div>

 <!-- table primary start -->
 <div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title text-center">User Manage</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">

                          

                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>

                                @if (auth()->user()->role_as === 'superadmin')
                                <th scope="col">Change</th>  
                                @endif
                               

                                <th scope="col">Actions</th>

                           
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($slider_images as $slider_image)
                              
                            <tr>
                               
                                <td>{{$slider_image->name}}</td>

                                <td>{{$slider_image->email}}</td>
                                <td>{{$slider_image->role_as}}
                                
                                    @if (auth()->user()->role_as === 'superadmin')
                                    <td>


                                        <form action="{{route('admin.user.role')}}" method="POST" >
                                            @csrf
                                            @method('PUT')
                                      
                                            <input type="hidden" name="user_id" value="{{$slider_image->id}}">
                                                <select class="form-select" name="role" id="">
                                                  <option value='superadmin'>Super Admin</option>
                                                  <option value='admin'>Admin</option>
                                                  <option value='creator'>Creator</option>
                                                  
                                                </select>
    
                                                <button type="submit" class="btn btn-sm  btn-success mx-2">Change</button>
                                        </form>
    
                                        
                                     </td>

                                    @endif
                           






                                <td class="d-flex justify-content-center align-items-center">
                                    @if (auth()->user()->role_as !== 'creator')
                                    <form class="d-inline " onclick="return confirm('Sure to delete product ?')"  action="{{route('admin.user.delete', $slider_image->id)}}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger mt-2 btn-sm"><i class="ti-trash"></i></button>
                                        </form>
                                    @endif
                               

                                </td>


                            </tr>

                            @endforeach
                   
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- table primary end -->


@endsection