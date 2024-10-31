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
                    <h5 class="mb-4">Update Product</h5>

                    <div class="template-preview">
                        <img src="{{$templates->image}}" />
                    </div>


                </div>
            </div>

            <div class="card col-md-6">
                <div class="card-body template-form">
                @include( 'admin.product.forms.edit.'.$templates->name )
        
                </div>
            </div>


        </div>



    </div>
    <!--end row-->







</div>
@endsection