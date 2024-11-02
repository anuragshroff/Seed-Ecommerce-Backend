
<style>
      body {
        font-family: Arial, sans-serif;
        color: #333;
        margin: 0;
        padding: 20px;
        background: #f8f9fa; /* Light background for better readability */
    }

    .container-fluid {
        max-width: 800px; /* Set a max width for better layout */
        margin: auto;
        background: #fff; /* White background for the PDF */
        padding: 20px;
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    .text-center {
        text-align: center;
    }

    .card {
        border: none; /* Remove default card border */
    }

    .card-body {
        padding: 20px;
    }

    h5, h4 {
        margin-top: 0; /* Remove default margin for headings */
    }

    .text-muted {
        color: #6c757d; /* Bootstrap muted text color */
    }

    .badge {
        padding: 0.5em 0.75em;
        border-radius: 0.25rem;
        display: inline-block;
        font-size: 0.875rem;
    }

    .badge-danger {
        background-color: #dc3545; /* Bootstrap red */
        color: white;
    }

    hr {
        border: 0;
        border-top: 1px solid #dee2e6; /* Light border for separation */
        margin: 1em 0;
    }

    table {
        width: 100%;
        border-collapse: collapse; /* Collapse borders for a cleaner look */
        margin-top: 20px;
    }

    th, td {
        padding: 12px; /* Increase padding for better spacing */
        border: 1px solid #dee2e6; /* Light border around cells */
        text-align: left; /* Left align text for better readability */
    }

    th {
        background-color: #f8f9fa; /* Light gray background for headers */
        font-weight: bold;
    }

    .text-right {
        text-align: right;
    }

    .gd-responsive-table {
        overflow-x: auto; /* Allow horizontal scrolling for smaller screens */
    }

    /* Responsive adjustments */
    @media print {
        body {
            margin: 0; /* Remove body margin for printing */
            padding: 0; /* Remove padding for printing */
        }

        .container-fluid {
            box-shadow: none; /* Remove shadow on print */
            border-radius: 0; /* Remove rounded corners on print */
        }

        img {
            max-width: 100%; /* Ensure images are responsive */
            height: auto; /* Maintain aspect ratio */
        }
    }
</style>

<div class="page-content" id="printSection">
    <div class="container-fluid">
        <div class="row" style="padding: 20px">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                       
                        <img src="data:image/webp;base64,{{ base64_encode(file_get_contents(public_path('uploads/softexel-logo.webp'))) }}" style="width: 200px; height: 40px; margin-left: 20px" />



                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-12">
                                <h5><b>Order Details :</b></h5>
                                <span class="text-muted">Transaction Id : {{$order->invoice_no}}</span><br>
                                <span class="text-muted">Order Id :</span> {{$order->id}}<br>
                                <span class="text-muted">Order Date :</span> {{$order->date}}<br>
                                <span class="text-muted">Payment Status :</span> Cash on Delivery
                                <div class="badge badge-danger">Unpaid</div><br>
                                <span class="text-muted">Payment Method :</span> Cash<br><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h4>Billing & Shipping Address :</h4>
                                <hr>
                                <span class="text-muted">Name: </span> {{$order->name}}<br>
                                <span class="text-muted">Phone: </span> {{$order->mobile}}<br>
                                <span class="text-muted">Address: </span> {{$order->address}}<br>
                                <span class="text-muted">Billing Area: </span> @if($order->area > 100) OutSide Dhaka @else Inside Dhaka @endif<br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Table -->
                                <div class="gd-responsive-table">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th><span class="h6">Products</span></th>
                                                <th><span class="h6">SKU</span></th>
                                                <th><span class="h6">Attribute</span></th>
                                                <th><span class="h6">Quantity</span></th>
                                                <th class="text-right"><span class="h6">Price</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->products['name'] }}
                                                    <br>
                                                   @endforeach

                                                </td>
                                                <td>

                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->products['code'] }}
                                                    <br>
                                                   @endforeach

                                                </td>
                                                <td>
                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->attributes?->name ?? 'N/A' }} - {{ $item->attributes_option?->name ?? 'N/A' }}<br>
                                                    <br>
                                                   @endforeach
                                                </td>
                                                <td>

                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->quantity }}
                                                    <br>
                                                   @endforeach

                                                </td>
                                                <td class="text-right">

                                                    @foreach ($order->order_attributes as $item)
                                                      {{ $item->products['price'] }}
                                                    <br>
                                                    @endforeach

                                                </td>
                                            </tr>
                                            <tr><td colspan="5" style="border: none;"></td></tr>
                                            <tr>
                                                <td><span class="text-muted">Shipping</span></td>
                                                <td colspan="4" class="text-right"><span> {{$order->area}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Amount</strong></td>
                                                <td colspan="4" class="text-right"><span class="h3"> Tk {{$order->amount}}</span></td>
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
