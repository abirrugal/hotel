


@extends('backend.layout.master')
@section('main_content')
    

<!-- DATE PICKER  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />




    
<div class="px-10">


<form action="{{route('admin.active.employee.filter')}}" method="POST">
@csrf


    
    <div class="form-row mt-4">
    
    <div class="col">
    <div class="mb-3">
    {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
    <input type="text" name="start_date" id="start" class="form-control" id="start" aria-describedby="PriceHelp" placeholder="Exp: Check-In Date">
    
    </div>
    </div>
    <div class="col">
    <div class="mb-3">
    {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
    <input type="text" name="end_date" id="end" class="form-control" id="end" aria-describedby="PriceHelp" placeholder="Exp: Check-Out Date">
    
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
            <a href="{{route('admin.employee.create')}}"> <div class="btn btn-success float-right mb-2">Create</div></a>

            <h4 class="header-title text-center">Active Employee Manage</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">

                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Section</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Join_date</th>
                                <th scope="col">Shift_name</th>
                                <th scope="col">Salary_range</th>
                                <th scope="col">Concern</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Bank_no</th>
                                <th scope="col">Status</th>
                           
                               

                                <th scope="col">Actions</th>

                           
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($infos as $info)
                              
                            <tr>
                               
                                <td class="font_sm">{{$info->id}}</td>  
                                <td class="font_sm">{{$info->name}}</td>  
                                <td class="font_sm">{{$info->department}}</td>                  
                                <td class="font_sm">{{$info->section}}</td>                                             
                                <td class="font_sm">{{$info->designation}}</td>  
                                <td class="font_sm">{{ \Carbon\Carbon::parse($info->join_date)->format('d/m/Y') }}</td>                                                        
                                <td class="font_sm">{{$info->shift_name}}</td>                  
                                <td class="font_sm">{{$info->salary_range}}</td>                  
                                <td class="font_sm">{{$info->branch}}</td>                  
                                <td class="font_sm">{{$info->concern}}</td>               
                                <td class="font_sm">{{$info->bank_no}}</td>                  
                                <td class="text-center">{{$info->status}}<a class="text-center" href="{{route('admin.employee.change_sts', $info->id)}}"><i class="fas fa-exchange-alt d-block"></i></a></td> 
                                    

                          <td>
                                    <div class="d-flex align-items-center">

                    

                                 {{-- <a class="mt-2 mr-3 btn btn-success me-3 btn-sm" href="{{route('admin.voucher.create', $info->id)}}"><i class="far fa-check-circle"></i> Confirm</a> --}}

                                    

                                    <a  href="{{route('admin.employee.edit', $info->id)}}" class="mt-2 mr-3 btn btn-warning me-3 btn-sm"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                 
                                    @if (auth()->user()->role_as !== 'creator')
                                    <form class="d-inline " onclick="return confirm('Sure to delete product ?')"  action="{{route('admin.employee.delete', $info->id)}}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger mt-2 btn-sm"><i class="ti-trash"></i> Delete</button>
                                        </form>
                                    @endif
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

<style>
    .px-10{
    padding: 3px 150px;
}
</style>

<script type="text/javascript">
  
    $('#start').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd mmm yyyy'
    });
  
    $('#end').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd mmm yyyy'
    });
  
    </script>
@endsection