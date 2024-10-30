@extends('admin.master')

@section('main-content')
<div class="page-content">


    <div class="row">
        <!-- Media Card -->


        <div class="container mt-5">
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header ">
                        <h5 class="card-title mb-0">Media Management</h5>
                    </div>






                    <div class="card-body">
                        <form  action="{{route('uploadMedia')}}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                         
                            <div class="row">
                                <!-- Logo Section -->
                                <div class="col-md-6 mb-4">
                                    <div class="border rounded p-3 bg-light">
                                        <h6 class="mb-3">Logo</h6>

                                        <img src="{{asset(getGeneralSetting()->logo)}}" style="width: 50px; height: 50px; border-radius: 5px;" />
                                       
                                        <div class="form-group">
                                            <label for="logoUpload" class="form-label">Upload Logo</label>
                                            <input type="file" name="logo" class="form-control" id="logoUpload"
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <!-- Favicon Section -->
                                <!-- Favicon Section -->
                                <div class="col-md-6 mb-4">
                                    <div class="border rounded p-3 bg-light">
                                        <h6 class="mb-3">Favicon</h6>

                                        <img src="{{asset(getGeneralSetting()->favicon)}}" style="width: 50px; height: 50px; border-radius: 5px;" />
                                       
                                        <div class="form-group">
                                            <label for="faviconUpload" class="form-label">Upload Favicon</label>
                                            <input type="file" class="form-control" name="favicon" id="faviconUpload">
                                        </div>
                                    </div>
                                </div>
                            </div>

                           




                            <!-- Submit Button -->
                            <div class="text-center">


                                <button type="submit" class="btn btn-primary w-100">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                    </svg>

                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>




                </div>
            </div>
        </div>



    </div>







</div>
@endsection