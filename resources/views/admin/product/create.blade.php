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
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Create Product</h5>
                        <form class="row g-3">

                            <div class="col-md-6">
                                <label for="productName" class="form-label">Product Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class='bx bx-user'></i></span>
                                    <input type="text" class="form-control" id="productName" name="name"
                                        placeholder="Product Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="code" class="form-label">Product Code</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class='bx bx-lock-alt'></i></span>
                                    <input type="text" class="form-control" id="code" name="code"
                                        placeholder="Product Code">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class='bx bx-user'></i></span>
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="Current Price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="previousPrice" class="form-label">Previous Price</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class='bx bx-envelope'></i></span>
                                    <input type="number" class="form-control" id="previousPrice" name="previous_price"
                                        placeholder="Previous Price">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_information"  class="form-label" >Product Information</label>
                                    <textarea class="summernote" id="product_information" name="product_information">{{ old('content') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">

                                 <label for="product_description" class="form-label">Product Description</label>
                                    <div class="form-group">
                                        <input type="text" name="product_description" class="summernote"
                                            id="product_description" placeholder="Product Description">
                                    </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <label for="input29" class="form-label">Featured Image</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class='bx bx-calendar'></i></span>
                                        <input type="file" class="form-control" id="input29">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="input29" class="form-label">First Image</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class='bx bx-calendar'></i></span>
                                        <input type="file" class="form-control" id="input29">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="input29" class="form-label">Second Image</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class='bx bx-calendar'></i></span>
                                        <input type="file" class="form-control" id="input29">
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <label for="input29" class="form-label">Third Image</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class='bx bx-calendar'></i></span>
                                        <input type="file" class="form-control" id="input29">
                                    </div>
                                </div>

                            </div>






                            <div class="row mt-3">
                                <h5>Choose Template</h5>

                                <div class="col-md-6">

                                    <img src="{{ asset('assets/static/template-1.jpg') }}" class="img-fluid" />

                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">Template 1</label>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <img src="{{ asset('assets/static/template-2.jpg') }}" class="img-fluid" />

                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">Template 2</label>
                                    </div>


                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome"
                                                    role="tab" aria-selected="true">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                                        </div>
                                                        <div class="tab-title">Size</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile"
                                                    role="tab" aria-selected="false" tabindex="-1">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                                        </div>
                                                        <div class="tab-title">Color</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#primarycontact"
                                                    role="tab" aria-selected="false" tabindex="-1">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon"><i
                                                                class="bx bx-microphone font-18 me-1"></i>
                                                        </div>
                                                        <div class="tab-title">Weight</div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content py-3">
                                            <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Small</td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Medium</td>
                                                        </tr>


                                                    </tbody>

                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Small</td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Medium</td>
                                                        </tr>


                                                    </tbody>

                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Small</td>
                                                        </tr>

                                                        <tr>
                                                            <td>2</td>
                                                            <td>Medium</td>
                                                        </tr>


                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="button" class="btn btn-primary px-4">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        <!--end row-->







    </div>
@endsection
