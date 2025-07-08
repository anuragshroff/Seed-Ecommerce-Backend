@extends('admin.master')

@section('main-content')

<div class="page-content">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class=" mb-0">Order Invoice </h3>
                    <div>
                        <a class="btn btn-primary btn-sm" href="{{route('order')}}"><i class="fas fa-chevron-left"></i> Back</a>
                        <a class="btn btn-primary btn-sm" href="{{route('order.print', $order->id)}}"  target="_blank"><i class="fas fa-print"></i> print</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">

                                <!-- Logo -->
                                <img class="img-fluid mb-5 mh-70" width="180" alt="Logo" src="https://bagdoom.softexel.com/public/assets/images/1724559875.webp">

                            </div>
                        </div> <!-- / .row -->
                        <div class="row">
                            <div class="col-12">
                                <h5><b>Order Details :</b></h5>

                                <span class="text-muted">Transaction Id : {{$order->invoice_no}}</span><br>
                                <span class="text-muted">Order Id :</span> {{$order->id}}<br>
                                <span class="text-muted">Order Date :</span>{{$order->date}}<br>
                                <span class="text-muted">Payment Status :Cash on Delivery</span>
                                <div class="badge badge-danger">
                                    Unpaid
                                </div>
                                <br>
                                <span class="text-muted">Payment Method :</span>Cash On Delivery<br>

                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h4>Billing &amp; Shipping Address :</h4>
                                <hr>

                                <span class="text-muted">Name: </span>
                                {{$order->name}}
                                <br>

                                <span class="text-muted">Phone: </span>{{$order->mobile}}<br>



                                <span class="text-muted">Address: </span>{{$order->address}}<br>

                                <span class="text-muted">Billing Area: </span>Inside Dhaka<br>



                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">

                                <!-- Table -->
                                <div class="gd-responsive-table">
                                    <table class="table my-4">
                                        <thead style="border: none">
                                            <tr>
                                                <th width="50%" class="px-0 bg-transparent border-top-0">
                                                    <span class="h6">Products</span>
                                                </th>
                                                <th class="px-0 bg-transparent border-top-0">
                                                    <span class="h6">Sku</span>
                                                </th>
                                                <th class="px-0 bg-transparent border-top-0">
                                                    <span class="h6">Attribute</span>
                                                </th>
                                                <th class="px-0 bg-transparent border-top-0">
                                                    <span class="h6">Quantity</span>
                                                </th>
                                                <th class="px-0 bg-transparent border-top-0 text-right">
                                                    <span class="h6">Price</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-0">
                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->products['name'] }}
                                                    <hr>
                                                   @endforeach
                                                </td>
                                                <td class="px-0">
                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->products['code'] }}
                                                    <hr>
                                                   @endforeach
                                                </td>
                                                <td class="px-0">
                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->attributes?->name ?? 'N/A' }} - {{ $item->attributes_option?->name ?? 'N/A' }}<br>
                                                    <hr>
                                                   @endforeach
                                                </td>
                                                <td class="px-0">
                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->quantity }}
                                                    <hr>
                                                   @endforeach
                                                </td>

                                                <td class="px-0 text-right">
                                                     @foreach ($order->order_attributes as $item)
                                                     ৳{{ $item->products['price'] }}
                                                    <hr>
                                                     @endforeach
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="px-0 border-top border-top-2">
                                                    <span class="text-muted">Shipping</span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="px-0 text-right border-top border-top-2" colspan="5">
                                                    <span>
                                                        ৳{{$order->area}}

                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-0 border-top border-top-2">

                                                    <strong>Total amount</strong>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="px-0 text-right border-top border-top-2" colspan="5">
                                                    <span class="h5">
                                                        ৳{{$order->amount}}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>

@endsection
