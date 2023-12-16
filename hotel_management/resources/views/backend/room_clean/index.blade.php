


@extends('backend.layout.master')
@section('main_content')
    
<div style="padding: 3px 150px;">



    <form action="{{route('admin.room_clean.filter')}}" method="POST">
    @csrf
    
        
        <div class="form-row mt-4">
        
        <div class="col">
        <div class="mb-3">
         {{-- <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
        <input type="text" name="room_no" value="{{old('room_no')}}" id="start" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Room No">
        
        </div>
        </div>
        <div class="col">
        <div class="mb-3">
        {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
        <input type="text" name="id" value="{{old('id')}}" id="end" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Room Id">
        
        </div>
        </div>
        
        
        </div>
        
        <div class="d-flex justify-content-center my-3">
        
        
        <button type="submit" class="btn btn-success w-50">Submit</button>
    
    </form>
    
    </div>
    
    
    
    </div>





 <!-- table primary start -->
 <div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <a href="{{route('admin.room.create')}}"> <div class="btn btn-success float-right mb-2">Create</div></a>

            <h4 class="header-title text-center">Room Information Manage</h4>
            <div class="single-table">
                <div style="table-responsive">
                <table class="table">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">

                          

                               
                                <th scope="col">Id</th>
                                <th scope="col">Room No</th>
                                <th scope="col">Category</th>
                                
                                <th scope="col">Floor</th>
                                <th scope="col">Clean Status</th>
                                <th scope="col">Last Clean</th>
                              
                                
                                <th scope="col">Actions</th>

                           
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($infos as $info)
                              
                            <tr>
                               

                                <td>{{$info->id}}</td>                  
                                <td>{{$info->room_no}}</td>                  
                                <td>{{$info->room_category}}</td>                  
                                                
                                <td>{{$info->floor_no}}</td>                  
                               
                                <td>
                                  
                                
                                    @if($info->clean_sts !== null)
                                    {{$info->clean_sts}}

                                    @else 
                                   <div class="ml-3"> --- </div>
                                    @endif
                                </td> 

                                <td>
                                    @if($info->last_clean !== null)
                                    {{$info->last_clean}}

                                    @else 
                                   <div class="ml-3"> --- </div>
                                    @endif

                                </td> 
                                
                                                         


                                <td>
                                    <div class="d-flex align-items-center">

                                    <a  href="{{route('admin.room_clean.edit', $info->id)}}" class="mt-2 mr-3 btn btn-warning me-3 btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                 
                                    {{-- @if (auth()->user()->role_as !== 'creator') --}}
                                 
                                    {{-- @endif --}}
                                    </div>
                                </td>


                            </tr>

                            @endforeach
                   
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center py-3"> {{$infos->links()}}</div>

    </div>
</div>
<!-- table primary end -->


@endsection