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

    <form method="POST" action="{{ route('api.store') }}">
        @csrf
        <div class="card">
            <div class="card-body">
                <h6 class="mb-3" style="color: red">Pathao Courier</h6>
                <div class="col-md-12">
                    <label for="pathau_client_id" class="form-label">Pathao Client Id <span style="color: red">*</span> </label>
                    <input type="text" class="form-control" name="pathau_client_id" id="pathau_client_id" value="{{ old('pathau_client_id', getApiSetting()->pathau_client_id) }}">

                    @error('pathau_client_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                </div>
                <div class="col-md-12">
                    <label for="pathau_client_secret" class="form-label">Pathao Client Secret <span style="color: red">*</span> </label>
                    <input type="text" class="form-control" name="pathau_client_secret" id="pathau_client_secret" value="{{ old('pathau_client_secret', getApiSetting()->pathau_client_secret) }}" >

                    @error('pathau_client_secret')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


                </div>
                <div class="col-md-12">
                    <label for="pathau_username" class="form-label">Pathao UserName <span style="color: red">*</span> </label>
                    <input type="text" class="form-control" name="pathau_username" id="pathau_username" value="{{ old('pathau_username', getApiSetting()->pathau_username) }}" >

                    @error('pathau_username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


                </div>
                <div class="col-md-12">
                    <label for="pathau_password" class="form-label">Pathao Password <span style="color: red">*</span> </label>
                    <input type="password" class="form-control" name="pathau_password" id="pathau_password"   value="{{ old('pathau_password', getApiSetting()->pathau_password) }}"  >

                    @error('pathau_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror



                </div>
            </div>
        </div>
    
        <div class="card">
            <div class="card-body">
                <h6 class="mb-3" style="color: red">Steadfast Courier</h6>
                <div class="col-md-12">
                    <label for="steadfast_client_id" class="form-label">Courier API Key <span style="color: red">*</span> </label>
                    <input type="text" class="form-control" name="steadfast_client_id" id="steadfast_client_id"  value="{{ old('steadfast_client_id', getApiSetting()->steadfast_client_id) }}"  >

                    @error('steadfast_client_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


                </div>
                <div class="col-md-12">
                    <label for="steadfast_client_secret" class="form-label">Courier Secret Key <span style="color: red">*</span> </label>
                    <input type="text" class="form-control" name="steadfast_client_secret" id="steadfast_client_secret"  value="{{ old('steadfast_client_secret', getApiSetting()->steadfast_client_secret) }}"  >

                    @error('steadfast_client_secret')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                  


                </div>
            </div>
        </div>
    
        <div class="card">
            <div class="card-body">
                <h6 class="mb-3" style="color: red">RedX Courier</h6>
                <div class="col-md-12">
                    <label for="redx_client_id" class="form-label">Courier API Key <span style="color: red">*</span> </label>
                    <input type="text" class="form-control" name="redx_client_id" id="redx_client_id"  value="{{ old('redx_client_id', getApiSetting()->redx_client_id) }}"  >

                    @error('redx_client_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                    
                </div>
                <div class="col-md-12">
                    <label for="redx_client_secret" class="form-label">Courier Secret Key <span style="color: red">*</span> </label>
                    <input type="text" class="form-control" name="redx_client_secret" id="redx_client_secret"  value="{{ old('redx_client_secret', getApiSetting()->redx_client_secret) }}">

                    
                    @error('redx_client_secret')
                    <div class="text-danger">{{ $message }}</div>
                @enderror



                </div>
            </div>
        </div>
    
        <button class="btn btn-primary w-100 btn-lg" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle mr-2" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
            </svg>
            Save Setting
        </button>
    </form>
    

   




</div>

@endsection
