@extends('admin.master')

@section('main-content')

<div class="page-content">
    <!--breadcrumb-->
  
    <div class="card">
        <div class="card-header">
            <h5>StockOut Product</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead style="background: #A9FFCD">
                        <tr>
                            <th>SL</th>
                          
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Quantity</th>
                            <th>Sold</th>
                            <th>In Stock</th>
                            <th>Price</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($all_stockout_product as $count => $item)
                        <tr>
                            <td>{{$count + 1}}</td>
                            <td>
                                <img src="{{asset($item->featured_image)}}" style="width: 50px; height: 50px; border-radius: 5px; border: 1px solid lightgray" />
                                {{$item->name}}
                            </td>
                            <td>{{$item->code}}</td>
                            <td>

                                @if($item->order_attributes->isNotEmpty())
                                {{ $item->order_attributes[0]->total_quantity + $item->quantity }}  {{-- Access the first order attribute quantity --}}
                                @else 
                                {{$item->quantity}}
                           
                                @endif

                              

                            </td>
                            <td>
                                @if($item->order_attributes->isNotEmpty())
                                    {{ $item->order_attributes[0]->total_quantity }}  {{-- Access the first order attribute quantity --}}
                                @else
                                    None {{-- Default value if there are no order attributes --}}
                                @endif
                            </td>
                           
                            <td>{{$item->quantity}}</td>

                            <td>{{$item->price}}</td>
                          

                        </tr>
                        @endforeach


                    </tbody>

                </table>
            </div>
        </div>
    </div>


</div>

@endsection