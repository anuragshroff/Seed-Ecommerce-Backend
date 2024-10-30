
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="page-content" id="printSection">

    <div class="container-fluid">

        <!-- Page Heading -->
       

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

                                <span class="text-muted">Transaction Id :</span><br>
                                <span class="text-muted">Order Id :</span>{{$order->invoice_no}}<br>
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

                                <span class="text-muted">Billing Area: </span> @if($order->area > 100) OutSide Dhaka @else Inside Dhaka @endif<br>



                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">

                                <!-- Table -->
                                <div class="gd-responsive-table">
                                    <table class="table table-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th width="40%" class="px-0 bg-transparent border-top-0">
                                                    <span class="h6">Products</span>
                                                </th>
                                                <th width="20%" class="px-0 bg-transparent border-top-0">
                                                    <span class="h6">Sku</span>
                                                </th>
                                                <th width="20%" class="px-0 bg-transparent border-top-0">
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
                                                    <br>
                                                   @endforeach
                                                </td>
                                                <td class="px-0">
                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->products['code'] }}
                                                    <br>
                                                   @endforeach

                                                </td>
                                                <td class="px-0">
                                                    @foreach($order->order_attributes as $item)
                                                    <span>{{ $item->attributes?->name }} - {{ $item->attributes_option?->name }}</span>
                                                    <br>
                                               
                                                @endforeach
                                                
                                                </td>
                                                <td class="px-0">
                                                    
                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->quantity }}
                                                    <br>
                                                   @endforeach

                                                </td>

                                                <td class="px-0 text-right">
                                                    
                                                    @foreach ($order->order_attributes as $item)
                                                    {{ $item->products['price'] }}
                                                  <br>
                                                  @endforeach

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="padding-top-2x" colspan="5">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-0 border-top border-top-2">
                                                    <span class="text-muted">Shipping</span>
                                                </td>
                                                <td class="px-0 text-right border-top border-top-2" colspan="5">
                                                    <span>
                                                        {{$order->area}}

                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-0 border-top border-top-2">

                                                    <strong>Total amount</strong>
                                                </td>
                                                <td class="px-0 text-right border-top border-top-2" colspan="5">
                                                    <span class="h3">
                                                        Tk {{$order->amount}}
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



<script>
    function printDiv() {
        // Get the HTML of the specific div
        var printContents = document.getElementById('printSection').innerHTML;
        
        // Open a new window
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;

        // Print the contents of the div
        window.print();

        // Revert to original content
        document.body.innerHTML = originalContents;
    }

    // Trigger the print function when the page loads
    document.addEventListener("DOMContentLoaded", function() {
        printDiv();
    });
</script>



