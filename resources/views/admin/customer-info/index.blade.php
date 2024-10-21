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
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>City</th>
                         

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Full Sleves T-shirt</td>
                            <td>RDJ-96955</td>
                            <td>5</td>
                            <td>4</td>
                            <td>1</td>
                           
                          

                        </tr>


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection