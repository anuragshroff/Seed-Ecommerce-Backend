@extends('admin.master')

@section('main-content')

<div class="page-content">

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #C6E5C3">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
                            <h6 class="my-1">Pending</h6>

                        </div>


                        <div class="  ms-auto">

                            <img src="{{ asset('assets/static/pending.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #9794FF">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
                            <h6 class="my-1">Confirmed</h6>

                        </div>


                        <div class="  ms-auto">

                            <img src="{{ asset('assets/static/confirmed.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #C69AE7">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
                            <h6 class="my-1">Processing</h6>

                        </div>


                        <div class="  ms-auto">

                            <img src="{{ asset('assets/static/cancel.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #6FE45F">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
                            <h6 class="my-1">Pick Up</h6>

                        </div>


                        <div class="  ms-auto">

                            <img src="{{ asset('assets/static/pickup.png') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #FDCA6E">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
                            <h6 class="my-1">On The Way</h6>

                        </div>


                        <div class="  ms-auto">

                            <img src="{{ asset('assets/static/way.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #60629F">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
                            <h6 class="my-1">Delivered</h6>

                        </div>


                        <div class="  ms-auto">

                            <img src="{{ asset('assets/static/delivery.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #98A8BF">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
                            <h6 class="my-1">Canceled</h6>

                        </div>


                        <div class="  ms-auto">

                            <img src="{{ asset('assets/static/cancel-order.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #ACCBAB">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
                            <h6 class="my-1">Return</h6>

                        </div>


                        <div class="  ms-auto">

                            <img src="{{ asset('assets/static/return.webp') }}" style="width:60px; height: 60px" />

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <div class="card radius-10">
        <div class="card-body">

            <form method="GET" action="{{ route('order.filter') }}">
                <div class="row">
                    <div class="col-md-2 mb-md-0 mb-2">
                        <input type="text" class="form-control" placeholder="Customer Name" name="customer_name" style="border: 1px solid #A9FFCD; border-radius: 10px" />
                    </div>

                    <div class="col-md-2 mb-md-0 mb-2">
                        <input type="text" class="form-control" placeholder="Phone No" name="phone" style="border: 1px solid #A9FFCD; border-radius: 10px" />
                    </div>

                    <div class="col-md-2 mb-md-0 mb-2">
                        <input type="text" class="form-control" placeholder="Product Code" name="product_code" style="border: 1px solid #A9FFCD; border-radius: 10px" />
                    </div>

                    <div class="col-md-2 mb-md-0 mb-2">
                        <input type="text" class="form-control" placeholder="Invoice No" name="invoice_no" style="border: 1px solid #A9FFCD; border-radius: 10px" />
                    </div>

                    <div class="col-md-2 mb-md-0 mb-2">
                        <input type="date" class="form-control" name="date" style="border: 1px solid #A9FFCD; border-radius: 10px" />
                    </div>

                    <div class="col-md-1 mb-md-0 mb-2">
                        <button type="submit" class="btn w-100" style="background: #49CE7F; color: white">Filter</button>
                    </div>

                    <div class="col-md-1 mb-md-0 mb-2">
                        <a href="{{route('order')}}" class="btn btn-danger w-100" style=" color: white">Reset</a>
                    </div>


                </div>
            </form>






            <div class="d-flex justify-content-between align-items-center mt-3">

                <div class="d-flex justify-content-start align-items-center" style="gap: 13px;">
                   
                    <a id="downloadPdfButton"  href="#" class="d-flex justify-content-center align-items-center" style="background: #4ACF80; width: 40px; height: 40px; border-radius: 20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEFEFE" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                        </svg>
                    </a>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center" style="gap: 13px;">
                            <button id="bulkDeleteButton" class="d-flex justify-content-center align-items-center" 
                                    style="background: #4ACF80; width: 40px; height: 40px; border-radius: 20px; border: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEFEFE" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                   
                </div>



            </div>





            <br>
            <div class="table-responsive">
                <table id="example" class="table align-middle mb-0">
                    <thead class="" style="background: #A9FFCD">
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAll" />
                                SL
                            </th>
                            <th>Invoice</th>
                            <th>Customer</th>
                            <th>Product Code</th>
                            <th>Products</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Couriar Status</th>

                            <th>Status Control</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($orders as $count => $item)
                        <tr>
                            <td>
                                <input type="checkbox" class="order-checkbox" value="{{ $item->id }}" />
                                {{$count + 1}} 
                            </td>

                            <td>
                                {{$item->invoice_no}}
                            </td>
                            <td>
                                <span>{{$item->name}} - {{$item->mobile}}</span><br>
                                
                                <span>{{$item->address}}</span>

                            </td>

                            <td>

                                
                                @foreach ($item->order_attributes as $data)
                                  
                                   {{ $data->products->code }}
                                  
                               @endforeach


                            </td>

                            <td>

                                {{-- 

                                
                                @if (!empty($item->order_attributes) && count($item->order_attributes) > 0)
                                <img src="{{asset($item->order_attributes[0]->products->featured_image)}}" style="width: 50px; height: 50px; border-radius: 5px;" />
                                {{$item->order_attributes[0]->products->name}}
                            @else
                                N/A
                            @endif
                               
                                
                                --}}


                                @foreach ($item->order_attributes as $data)
                                   <img src="{{asset($data->products->featured_image)}}" style="width: 50px; height: 50px; border-radius: 5px;" />
                                   {{ $data->products->name }}
                                  
                               @endforeach


                            </td>


                            <td>{{$item->amount}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                {{$item->couriar_status}}
                            </td>
                            <td>

                                <div class="d-flex gap-5">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" style="background: #4acf80; color: white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Update Order
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li>
                                                <a href="{{route('sendSteadfast', $item->id)}}" style="margin-left: 15px; color: #3d4e6a">Sent To SteadFast</a>
                                                
                                            </li>

                                            @foreach(['Pending', 'Processing', 'Delivered', 'Cancelled', 'Pending Delivery', 'Returned'] as $status)
                                            <li>
                                                <form action="{{ route('order.updateStatus', $item->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="{{ $status }}">
                                                    <button type="submit" class="dropdown-item">{{ $status }}</button>
                                                </form>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>


                                </div>

                            </td>

                            <td>

                                <div class="d-flex justify-content-between align-items-center mt-3">

                                    <div class="d-flex justify-content-start align-items-center" style="gap: 13px;">
                                        <a href="{{route('order.view', $item->id)}}" class="d-flex justify-content-center align-items-center" style="background: #4ACF80; width: 40px; height: 40px; border-radius: 20px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEFEFE" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('order.downloadPDF', $item->id) }}" class="d-flex justify-content-center align-items-center" style="background: #4ACF80; width: 40px; height: 40px; border-radius: 20px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEFEFE" class="bi bi-download" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                            </svg>
                                        </a>
                                        <a href="{{route('order.delete', $item->id)}}" class="d-flex justify-content-center align-items-center" style="background: #4ACF80; width: 40px; height: 40px; border-radius: 20px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEFEFE" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                        </a>
                                    </div>
                    
                    
                    
                                </div>

                                
                            </td>


                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<!---bulk of delete--->
<script>
    $(document).ready(function() {
        // Handle the click event on the bulk delete button
        $('#bulkDeleteButton').on('click', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Gather all selected checkbox values
            let selectedIds = $('.order-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

           

            // Check if any checkboxes are selected
            if (selectedIds.length === 0) {
                alert('Please select at least one order to delete.');
                return;
            }

            // Confirm delete action
            if (confirm('Are you sure you want to delete the selected orders?')) {
                // Submit the form with the selected IDs
                $.ajax({
                    url: '{{ route("order.bulkDelete") }}', // Adjust your route here
                    method: 'POST',
                    data: {
                        ids: selectedIds,
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    },
                    success: function(response) {
                        // Handle success response
                        success_noti(response.message);
                        location.reload(); // Reload the page or update the UI as needed
                    },
                    error: function(xhr) {
                        // Handle error response
                        alert('An error occurred while deleting orders. Please try again.');
                    }
                });
            }
        });

        // Handle the select all checkbox
        $('#selectAll').on('change', function() {
            $('.order-checkbox').prop('checked', this.checked);
        });
    });
</script>

<!----download bulk of pdf--->
<script>
    $(document).ready(function() {
        $('#downloadPdfButton').click(function(event) {
            event.preventDefault(); // Prevent the default anchor behavior

            // Get selected IDs from checked checkboxes
            let selectedIds = $('.order-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            console.log(selectedIds);

            if (selectedIds.length > 0) {
                // Redirect to the download URL with selected IDs as a query parameter
                window.location.href = '/download-bulk-pdf?ids=' + JSON.stringify(selectedIds);
            } else {
                alert('Please select at least one order to download.');
            }
        });
    });
</script>









@endpush
