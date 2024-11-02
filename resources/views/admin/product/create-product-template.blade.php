@extends('admin.master')

@section('main-content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="/" class="btn btn-primary">Go Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">



        <div class="row gap-5">

            <div class="card col-md-5">
                <div class="card-body p-4">
                    <h5 class="mb-4">Create Product</h5>

                    <div class="template-preview">
                        <img src="{{$templates->image}}" />
                    </div>




                    <!-- <form class="row g-3" method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
                            @csrf
                            <div class="col-md-6">
                                <label for="productName" class="form-label">Product Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class='bx bx-user'></i></span>
                                    <input type="text" class="form-control" id="productName" name="name" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="col-md-6">
                                <label for="code" class="form-label">Product Code</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class='bx bx-lock-alt'></i></span>
                                    <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}">
                                </div>
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class='bx bx-user'></i></span>
                                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                                </div>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="col-md-6">
                                <label for="previousPrice" class="form-label">Previous Price</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class='bx bx-envelope'></i></span>
                                    <input type="number" class="form-control" id="previousPrice" name="previous_price" value="{{ old('previous_price') }}">
                                </div>
                                @error('previous_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="col-md-12">
                                <label for="product_information" class="form-label">Product Information</label>
                                <textarea class="summernote" id="product_information" name="product_information">{{ old('product_information') }}</textarea>
                                @error('product_information')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <label for="featured_image" class="form-label">Featured Image</label>
                                    <div class="input-group">
                                        <input type="file" name="featured_image" class="form-control" id="featured_image">
                                    </div>
                                    @error('featured_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        
                                <div class="col-md-3">
                                    <label for="first_image" class="form-label">First Image</label>
                                    <div class="input-group">
                                        <input type="file" name="first_image" class="form-control" id="first_image">
                                    </div>
                                    @error('first_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        
                                <div class="col-md-3">
                                    <label for="second_image" class="form-label">Second Image</label>
                                    <div class="input-group">
                                        <input type="file" name="second_image" class="form-control" id="second_image">
                                    </div>
                                    @error('second_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        
                                <div class="col-md-3">
                                    <label for="third_image" class="form-label">Third Image</label>
                                    <div class="input-group">
                                        <input type="file" name="third_image" class="form-control" id="third_image">
                                    </div>
                                    @error('third_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <label for="product_description" class="form-label">Product Description</label>
                                <textarea class="summernote" id="product_description" name="product_description">{{ old('product_description') }}</textarea>
                                @error('product_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                           

                            <div class="col-md-6">
                                <label for="quantity" class="form-label">Quantity</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class='bx bx-envelope'></i></span>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                                </div>
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        
                        
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary" role="tablist">
                                            @foreach($attributes as $key => $attribute)
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#tab{{ $attribute->id }}" role="tab">
                                                        <div class="d-flex align-items-center">
                                                            <div class="tab-title">{{ $attribute->name }}</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content py-3">
                                            @foreach($attributes as $key => $attribute)
                                                <div class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}" id="tab{{ $attribute->id }}" role="tabpanel">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($attribute->attribute_options as $option)
                                                                <tr>
                                                                    <td>
                                                                        <input class="form-check-input" type="checkbox" name="attribute_options[{{ $attribute->id }}][]" value="{{ $option->id }}"
                                                                        {{ is_array(old('attribute_options.'.$attribute->id)) && in_array($option->id, old('attribute_options.'.$attribute->id)) ? 'checked' : '' }}>
                                                                    </td>
                                                                    <td>{{ $option->name }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                                </div>
                            </div> 
                        </form>-->





                </div>
            </div>

            <div class="card col-md-6">
                <div class="card-body template-form">
                @include( 'admin.product.forms.'.'template-'.$templates->id )
        
                </div>
            </div>


        </div>



    </div>
    <!--end row-->







</div>
@endsection