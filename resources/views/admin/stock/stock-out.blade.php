@extends('admin.master')

@section('main-content')

<div class="page-content">
    <!--breadcrumb-->
  
    <div class="card">
        <div class="card-header">
            <h5>Stockout</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead style="background: #A9FFCD">
                        <tr>
                          
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Quantity</th>
                            <th>Sold</th>
                            <th>In Stock</th>
                            <th>Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Full Sleves T-shirt</td>
                            <td>RDJ-96955</td>
                            <td>5</td>
                            <td>4</td>
                            <td>1</td>
                            <td>1200</td>
                          

                        </tr>


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection