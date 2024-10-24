@extends('admin.master')

@section('main-content')

<div class="page-content">
    <!--breadcrumb-->
    

    <div class="card">

        <div class="card-header">
            All Products

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead style="background: #A9FFCD">
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($all_products as $count => $item)
                        <tr>
                            <td>
                              
                                {{$count + 1}}
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{$item->featured_image}}" alt="Product Image" class="product-image me-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    <span>{{$item->name}}</span>
                                </div>
                            </td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>

                                <a href="javascript:void(0)" class="badge bg-primary status-toggle" data-id="{{$item->id}}">
                                    {{$item->status}}
                                </a>

                            </td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center" style="gap: 13px;">
                                    <a href="#" class="d-flex justify-content-center align-items-center" style="background: #4ACF80; width: 40px; height: 40px; border-radius: 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEFEFE" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg>
                                    </a>
                                    <a href="{{route('product.edit', $item->id)}}" class="d-flex justify-content-center align-items-center" style="background: #4ACF80; width: 40px; height: 40px; border-radius: 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEFEFE" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                          </svg>
                                    </a>
                                   
                                    <a href="javascript:void(0);" class="d-flex justify-content-center align-items-center delete-product" data-id="{{ $item->id }}" style="background: #4ACF80; width: 40px; height: 40px; border-radius: 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FEFEFE" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </a>

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

<script>
    $(document).on('click', '.status-toggle', function(e) {
        e.preventDefault();

        var productId = $(this).data('id');
        var $this = $(this);

        // Send AJAX request to update status
        $.ajax({
            url: '{{ route("product.toggleStatus") }}', // The route to handle status change
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // CSRF protection
                id: productId
            },
            success: function(response) {
                if (response.success) {
                    // Update the badge text based on the new status
                    $this.text(response.new_status);
                    $this.toggleClass('bg-primary bg-danger'); // Change badge color if needed
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
</script>

<script>
    $(document).on('click', '.delete-product', function(e) {
        e.preventDefault();
        let productId = $(this).data('id');
        let url = '/product/' + productId; // This is the route generated by the resource controller
        
        // Show confirmation dialog
        if(confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.success);
                    location.reload(); // Reload the page to reflect the changes
                },
                error: function(xhr) {
                    alert('An error occurred while trying to delete the product.');
                }
            });
        }
    });
</script>




@endpush