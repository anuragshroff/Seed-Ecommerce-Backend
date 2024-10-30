@extends('admin.master')

@section('main-content')

<div class="page-content">
    <!--breadcrumb-->
  
    <div class="card">
        <div class="card-header">
            <h5>Customer Information</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead style="background: #A9FFCD">
                        <tr>
                          
                            <th>Name</th>
                            
                            <th>Phone Number</th>
                            <th>Address</th>
                            
                         

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_customers as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                           
                            <td>{{$item->mobile}}</td>
                            <td>{{$item->address}}</td>
                          
                           
                          

                        </tr>
                        @endforeach


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection