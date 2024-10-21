@extends('admin.master')

@section('main-content')

<div class="page-content">
    <!--breadcrumb-->

    <div class="card">
        <div class="card-header">
            <h5>Courier Settings</h5>
        </div>
        <div class="card-body p-4">


                <div class="col-md-12">
                    <label for="input9" class="form-label">Select which courier you want to use <span style="color: red">*</span></label>
                    <select id="input9" class="form-select">
                        <option selected="">Choose...</option>
                        <option>Pathao Couriar</option>
                        <option>Steadfast Courier</option>
                        <option>RedX Courier</option>
                    </select>
                </div>

          
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <h6 class="mb-3" style="color: red">Pathao Courier</h6>



            <div class="col-md-12">
                <label for="input1" class="form-label">Pathao Client Id <span style="color: red">*</span> </label>
                <input type="text" class="form-control" id="">
            </div>

            <div class="col-md-12">
                <label for="input1" class="form-label">Pathao Client Secret <span style="color: red">*</span> </label>
                <input type="text" class="form-control" id="input1">
            </div>

            <div class="col-md-12">
                <label for="input1" class="form-label">Pathao UserName <span style="color: red">*</span> </label>
                <input type="text" class="form-control" id="input1">
            </div>

            <div class="col-md-12">
                <label for="input1" class="form-label">Pathao Password <span style="color: red">*</span> </label>
                <input type="text" class="form-control" id="input1">
            </div>


        </div>

    </div>

    <div class="card">
        <div class="card-body">

            <h6 class="mb-3" style="color: red">Steadfast Courier</h6>



            <div class="col-md-12">
                <label for="input1" class="form-label">Courier API Key <span style="color: red">*</span> </label>
                <input type="text" class="form-control" id="">
            </div>

            <div class="col-md-12">
                <label for="input1" class="form-label">Courier Secret Key <span style="color: red">*</span> </label>
                <input type="text" class="form-control" id="input1">
            </div>


        </div>

    </div>

    <div class="card">
        <div class="card-body">

            <h6 class="mb-3" style="color: red">RedX Courier</h6>



            <div class="col-md-12">
                <label for="input1" class="form-label">Courier API Key <span style="color: red">*</span> </label>
                <input type="text" class="form-control" id="">
            </div>

            <div class="col-md-12">
                <label for="input1" class="form-label">Courier Secret Key <span style="color: red">*</span> </label>
                <input type="text" class="form-control" id="input1">
            </div>


        </div>

    </div>




</div>

@endsection
