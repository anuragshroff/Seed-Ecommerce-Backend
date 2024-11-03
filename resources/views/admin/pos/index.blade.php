@extends('admin.master')

@section('main-content')

<style>
    .quantity,
    .discount {
        border: 1px solid lightgray;
        outline: none;
        width: 60px;
    }

    .product-image {
        cursor: pointer;
    }

    #productTable tbody {
        display: table-row-group;
        /* Ensure it behaves like a row group */
    }
</style>

<div class="page-content">
    <!--breadcrumb-->


    <div class="card">
        <div class="card-body">
            <h6>Add New</h6>

        </div>


    </div>

    <form id="orderForm">
        @csrf

        <div class="row mt-5">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <p style="font-size: 19px">Customer Information</p>
                        <div class="col-md-12 mt-3">
                            <label for="name" class="form-label">আপনার নাম</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="আপনার নাম">
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="address" class="form-label">আপনার ঠিকানা</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="আপনার ঠিকানা">
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="mobile" class="form-label">আপনার মোবাইল</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                placeholder="আপনার মোবাইল">
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="payment_status" class="form-label">Payment Status</label>
                            <select class="form-select" name="payment_status" id="payment_status">
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>

                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="Pending">Pending</option>
                                <option value="Processing">Processing</option>
                                <option value="Pending Delivery">Pending Delivery</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Returned">Returned</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="address" class="form-label">Select Area</label>
                            <select class="form-select" id="areaSelect" name="area">
                                <option value="{{ getGeneralSetting()->delivery_charge_inside }}" selected>Inside Dhaka
                                    {{ getGeneralSetting()->delivery_charge_inside }} </option>
                                <option value="{{ getGeneralSetting()->delivery_charge_outside }}">Outside Dhaka {{
                                    getGeneralSetting()->delivery_charge_outside }}</option>

                            </select>
                        </div>







                    </div>

                </div>

            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p style="font-size: 19px">Product Information</p>

                        <div class="col-md-12 mt-3">
                            <label for="name" class="form-label">Product Name or Product Code (SKU)</label>
                            <input type="text" class="form-control" id="product_search" name="product_search">
                            <div id="searchResults" class="list-group position-absolute w-100" style="z-index: 100;">
                            </div>
                        </div>
                        <table id="productTable" class="table table-striped table-hover mt-3">
                            <thead>
                                <th># </th>
                                <th>Product</th>
                                <th>Attribute</th>
                                <th>Quantity</th>
                                <th>Product Price</th>
                                <th>Total</th>
                                <th>Action</th>
                            </thead>
                            <tbody>




                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="5">Shipping Charge</td>
                                    <td colspan="2" id="shippingCharge"></td>
                                </tr>
                                <tr>
                                    <td colspan="5">Discount Amount</td>
                                    <td colspan="2">
                                        <input type="number" class="discount" id="discountAmount" value="0" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">Total</td>
                                    <td colspan="2" id="grandTotal"></td>
                                </tr>
                            </tfoot>


                        </table>

                        <button type="submit" class="btn btn-primary btn-sm">Order Create</button>


                    </div>

                </div>

                <hr>




                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-md-2">
                                <img src="{{asset($product->featured_image)}}"
                                    style="width: 60px; height: 60px; border-radius: 5px" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                    data-attributes='{{ json_encode($product->product_attribute_options) }}'
                                    data-image="{{ asset($product->featured_image) }}" class="product-image" />
                                <!-- Add class for targeting in jQuery -->
                                <p class="mt-2">{{ $product->name }}</p>
                            </div>
                            @endforeach
                        </div>




                    </div>

                </div>

            </div>

        </div>

    </form>




</div>

@endsection

@push('scripts')


<script>
    $(document).ready(function() {
         // Set initial shipping cost based on selection
         let shippingCost = parseFloat($('#areaSelect').val()) || 60;

          // Update shipping charge display initially
        $('#shippingCharge').text(`৳${shippingCost.toFixed(2)}`);
       

        $('#product_search').on('keyup', function() {
            let query = $(this).val();
           
            if (query.length >= 1) {
                $.ajax({
                    url: "{{ route('products.search') }}",
                    type: "GET",
                    data: { term: query },
                    success: function(data) {
                        $('#searchResults').empty();
                        $.each(data, function(index, product) {
                            $('#searchResults').append(`
                                <div class="list-group-item list-group-item-action" 
                                    data-id="${product.id}" 
                                    data-name="${product.name}" 
                                    data-price="${product.price}" 
                                    data-attributes='${JSON.stringify(product.product_attribute_options)}'
                                    data-image="${product.featured_image}">
                                    <img src="${product.featured_image}" alt="${product.name}" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px; border-radius: 5px">
                                    ${product.name}
                                </div>
                           `);
                        });
                    }
                });
            }else{
                $('#searchResults').empty();
            }
        });

        // Add selected product to table
        $('#searchResults').on('click', '.list-group-item', function() {

            let product = {
                id: $(this).data('id'),
                name: $(this).data('name'),
                price: parseFloat($(this).data('price')),
                image: $(this).data('image'),
                attributes: $(this).data('attributes')
            };


            let attributeDropdowns = '';
            const uniqueAttributes = {};

            // Collect unique attributes
            $.each(product.attributes, function(index, option) {
                 let attributeId = option.attribute_id;
                 let attributeName = option.attributes.name;
                 let optionName = option.attributes_option.name;

                if (!uniqueAttributes[attributeId]) {
                    uniqueAttributes[attributeId] = { name: attributeName, options: [] };
                }
                uniqueAttributes[attributeId].options.push({
                    id: option.attributes_option.id, // assuming there's an id for each option
                    name: optionName
                });
            });

             // Generate dropdowns for each attribute
            $.each(uniqueAttributes, function(attributeId, attribute) {
                 attributeDropdowns += `
                 <div class="mb-1">
                     <span>${attribute.name}</span>
                      <select style="border: 1px solid lightgray; outline: none; margin-left: 5px">
                         ${attribute.options.map(opt => `<option value="${opt.id}">${opt.name}</option>`).join('')}
                    </select>
                </div> `;
            });



            $('#productTable tbody').append(`
                <tr data-id="${product.id}">
                    <td><img src="${product.image}" width="50" /></td>
                    <td>${product.name}</td>
                    <td>${attributeDropdowns}</td>
                    <td><input type="number" class="quantity" value="1" min="1" data-price="${product.price}"></td>
                    <td class="product-price">${product.price.toFixed(2)}</td>
                    <td class="product-total">${product.price.toFixed(2)}</td>
                    <td><button class="btn btn-danger btn-sm remove-product"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/></svg></button></td>
                </tr>
               `);

            
            $('#product_search').val('');
            $('#searchResults').empty();
            updateTotal();
        });



        $('.product-image').on('click', function() {

                let product = {
                    id: $(this).data('id'),
                    name: $(this).data('name'),
                    price: parseFloat($(this).data('price')),
                    image: $(this).data('image'),
                    attributes: $(this).data('attributes') // This should already be in the correct format
                };

                let attributeDropdowns = '';
                const uniqueAttributes = {};

                     // Ensure attributes are parsed as an array if not already
                if (Array.isArray(product.attributes)) {
                    $.each(product.attributes, function(index, option) {

                        if (option.attributes && option.attributes.name) {
                             let attributeId = option.attribute_id; // Extract attribute ID
                             let attributeName = option.attributes.name;
                             let optionName = option.attributes_option ? option.attributes_option.name : '';

                                 // Ensure the uniqueAttributes object is populated correctly
                             if (!uniqueAttributes[attributeId]) {
                                uniqueAttributes[attributeId] = { name: attributeName, options: [] };
                             }

                                 // Push the option name with its ID
                             uniqueAttributes[attributeId].options.push({ name: optionName, id: option.attributes_option.id });
                        }
                    });

                          // Generate dropdowns
                    $.each(uniqueAttributes, function(attributeId, attribute) {
                         attributeDropdowns += `
                         <div class="mb-1">
                             <span>${attribute.name}</span>
                             <select style="border: 1px solid lightgray; outline: none; margin-left: 5px" data-attribute-id="${attributeId}">
                                 ${attribute.options.map(opt => `<option value="${opt.id}">${opt.name}</option>`).join('')}
                             </select>
                        </div> `;
                    });
                }

                    // Check if the product is already in the table
                if ($('#productTable tbody').find(`tr[data-id="${product.id}"]`).length > 0) {
                     alert('This product has already been added to the table.');
                    return; // Exit the function to prevent adding the same product again
                }

                 $('#productTable tbody').append(`
                     <tr data-id="${product.id}">
                         <td><img src="${product.image}" width="50" /></td>
                         <td>${product.name}</td>
                         <td>${attributeDropdowns}</td>
                         <td><input type="number" class="quantity" value="1" min="1" data-price="${product.price}"></td>
                         <td class="product-price">${product.price.toFixed(2)}</td>
                         <td class="product-total">${product.price.toFixed(2)}</td>
                         <td><button class="btn btn-danger btn-sm remove-product"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/></svg></button></td>
                    </tr>
                `);

                $('#product_search').val('');
                $('#searchResults').empty();
                updateTotal();
        });



                // Remove product from table
        $('#productTable tbody').on('click', '.remove-product', function() {
                $(this).closest('tr').remove();
                updateTotal();
        });

                  // Update product total based on quantity change
        $('#productTable').on('input', '.quantity', function() {
                 const price = parseFloat($(this).data('price'));
                 const quantity = parseInt($(this).val());
                 const totalPrice = price * quantity;
                 $(this).closest('tr').find('.product-total').text(totalPrice.toFixed(2));
                 updateTotal();
        });



                   // Listen for changes in the area selection dropdown
        $('#areaSelect').on('change', function() {
                 shippingCost = parseFloat($(this).val()) || 70;
                 updateTotal();
                 $('#shippingCharge').text(`৳${shippingCost.toFixed(2)}`);
        });

       

      

                 // Listen for discount input changes
            $('#discountAmount').on('input', updateTotal);

                 // Function to update the grand total
            function updateTotal() {
                let productTotal = 0;

                $('#productTable tbody .product-total').each(function() {
                   productTotal += parseFloat($(this).text());
                });

                let discount = parseFloat($('#discountAmount').val()) || 0;
                let grandTotal = productTotal + shippingCost - discount;
                $('#grandTotal').text(`৳${grandTotal.toFixed(2)}`);
            }

                 // Initial call to set default grand total
            updateTotal();
    });


</script>

<script>
    $(document).ready(function() {
        

        $('#orderForm').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serializeArray();

            let products = [];


            $('#productTable tbody tr').each(function() {
                let productId = $(this).data('id');
                let quantity = $(this).find('.quantity').val();
               
                let attributes = [];

               

                // Collect selected attributes if any
                $(this).find('select').each(function() {
                    attributes.push($(this).val());
                });


                products.push({ id: productId, quantity: quantity, attributes: attributes });
            });

            // Add products to formData
            formData.push({ name: 'products', value: JSON.stringify(products) });

              // Get the grand total and add it to formData
             let grandTotal = parseFloat($('#grandTotal').text().replace('৳', '').replace(',', '')) || 0;
             formData.push({ name: 'grandTotal', value: grandTotal });

            console.log(JSON.stringify(formData, null, 2));

           

            $.ajax({
                url: "{{ route('posorders.store') }}",
                "_token": "{{ csrf_token() }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    alert('Order created successfully!');
                    $('#orderForm')[0].reset();
                    $('#productTable tbody').empty();
                },
                error: function(xhr) {
                    alert('Insufficient stock for product!');
                   
                }
            });
        });
    });
</script>




@endpush