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
                        <form id="mediaForm" action="https://rumacloths.com/upload-media" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="XcUPe9ISxChwEEk9U29QtezDLldr17lBRDy0Obq0" autocomplete="off">                                    <div class="row">
                                <!-- Logo Section -->
                                <div class="col-md-6 mb-4">
                                    <div class="border rounded p-3 bg-light">
                                        <h6 class="mb-3">Logo</h6>
                                        <div class="media-preview mb-3 text-center">
                                            <img id="logoPreview" src="https://rumacloths.com/path/to/logo.png" alt="Logo" class="img-fluid">
                                        </div>
                                        <div class="form-group">
                                            <label for="logoUpload" class="form-label">Upload Logo</label>
                                            <input type="file" name="logo" class="form-control" id="logoUpload" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <!-- Favicon Section -->
                                 <!-- Favicon Section -->
                            <div class="col-md-6 mb-4">
                                <div class="border rounded p-3 bg-light">
                                    <h6 class="mb-3">Favicon</h6>
                                    <div class="media-preview mb-3 text-center">
                                        <img id="faviconPreview" src="path/to/favicon.ico" alt="Favicon" class="img-fluid" style="max-width: 50px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="faviconUpload" class="form-label">Upload Favicon</label>
                                        <input type="file" class="form-control" name="favicon" id="faviconUpload">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">   
                            <!-- Loader Section -->
                            <div class="col-md-6 mb-4">
                                <div class="border rounded p-3 bg-light">
                                    <h6 class="mb-3">Loader</h6>
                                    <div class="media-preview mb-3 text-center">
                                        <img id="loaderPreview" src="path/to/loader.gif" alt="Loader" class="img-fluid">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="loaderUpload" class="form-label">Upload Loader</label>
                                        <input type="file" name="loader" class="form-control" id="loaderUpload" accept="image/*">
                                    </div>

                                </div>
                            </div>
                            <!-- Footer Image Section -->
                            <div class="col-md-6 mb-4">
                                <div class="border rounded p-3 bg-light">
                                    <h6 class="mb-3">Footer Image</h6>
                                    <div class="media-preview mb-3 text-center">
                                        <img id="footerImagePreview" src="path/to/footer_image.png" alt="Footer Image" class="img-fluid">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="footerImageUpload" class="form-label">Upload Footer
                                            Image</label>
                                        <input type="file" name="footer_image" class="form-control" id="footerImageUpload" accept="image/*">
                                    </div>
                                </div>
                            </div>
                       
                            



                              
                            </div>
                            <!-- Submit Button -->
                            <div class="text-center">
                                

                                <button type="submit" class="btn btn-primary w-100">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
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
