@extends('admin.master')

@section('main-content')

<div class="page-content">

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #88CD74">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">{{$today_sale_amount}}</p>
                            <h6 class="my-1">Today Sale</h6>

                        </div>


                        <div
                            class="  ms-auto">

                            <img src="{{ asset('assets/static/dollar.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #FCD361">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">{{$today_return_amount}}</p>
                            <h6 class="my-1">Today Return</h6>

                        </div>


                        <div
                            class="  ms-auto">

                            <img src="{{ asset('assets/static/return-box.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #F37252">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">{{$today_cancel_amount}}</p>
                            <h6 class="my-1">Today Cancel</h6>

                        </div>


                        <div
                            class="  ms-auto">

                            <img src="{{ asset('assets/static/cancel.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #DD91FD">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">{{$pending_amount}}</p>
                            <h6 class="my-1">Pending Order</h6>

                        </div>


                        <div
                            class="  ms-auto">

                            <img src="{{ asset('assets/static/pending-order.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #ACB4FF">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">{{$total_delivered}}</p>
                            <h6 class="my-1">Delivered</h6>

                        </div>


                        <div
                            class="  ms-auto">

                            <img src="{{ asset('assets/static/delivery.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #F5BBC9">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">{{$total_cancel}}</p>
                            <h6 class="my-1">Cancel Order</h6>

                        </div>


                        <div
                            class="  ms-auto">

                            <img src="{{ asset('assets/static/cancel-order.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--end row-->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>

        </div>

    </div>


    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Todays All Order</h5>
                </div>
                <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                </div>
            </div>
            <hr />
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class=""  style="background: #A9FFCD">
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Order Amount</th>
                           
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($todays_all_order as $item)
                        <tr>
                            <td>1</td>
                           
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        @foreach($item->order_attributes as $data)
                                        <img src="{{$data->products->featured_image}}" alt="">
                                        @endforeach
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">
                                            @foreach($item->order_attributes as $data)
                                            {{$data->products->name}}
                                            @endforeach
                                        </h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->invoice_no}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->amount}} ৳</td>
                            <td>
                                <div class="d-grid">
                                    <a href="javascript:;"
                                        class="btn btn-sm btn-outline-info radius-30">{{$item->status}}</a>
                                </div>
                            </td>
                          
                        </tr>
                        @empty 
                        <tr>
                            <td colspan="3">No Item Found</td>
                        </tr>
                        @endforelse
                       
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>

    // Convert PHP data to JavaScript arrays
    var totalDeliveryAmounts = @json($total_delivery_amounts_data);
    var totalCancelAmounts = @json($total_cancel_amounts_data);
    var totalReturnAmounts = @json($total_return_amounts_data);
    var months = @json($months); // Changed from 'dates' to 'months'

    var options = {
        series: [{
            name: 'Delivery',
            data: totalDeliveryAmounts
        }, {
            name: 'Cancel',
            data: totalCancelAmounts
        }, {
            name: 'Return',
            data: totalReturnAmounts
        }],
        chart: {
            height: 350,
            type: 'area'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'category',  // Use 'category' to prevent interpolation
            categories: months // Use the dynamically generated months
        },
        tooltip: {
            x: {
                format: 'yyyy-MM-dd'
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

@endpush