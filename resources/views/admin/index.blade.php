@extends('admin.master')

@section('main-content')

<div class="page-content">

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

        <div class="col">
            <div class="card radius-10">
                <div class="card-body" style="background: #88CD74">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
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
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
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
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
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
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
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
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
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
                            <p class="mb-0 fw-bold" style="color: black; font-size : 25px">2362</p>
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
                    <div id="chart3"></div>
                </div>
            </div>

        </div>

    </div>


    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Product Orders List</h5>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                           
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        <img src="assets/images/products/12.png" alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">Light Blue Chair</h6>
                                    </div>
                                </div>
                            </td>
                            <td>Brooklyn Zeo</td>
                            <td>12 Jul 2020</td>
                            <td>$64.00</td>
                            <td>
                                <div class="d-grid">
                                    <a href="javascript:;"
                                        class="btn btn-sm btn-outline-info radius-30">Pending</a>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex order-actions gap-3">
                                    <a href="javascript:;"><i class='bx bx-trash'></i></a>
                                    <a href="javascript:;"><i class='bx bx-cloud-download'></i></a>
                                </div>
                            </td>
                        </tr>
                       
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection