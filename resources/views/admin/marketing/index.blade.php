@extends('admin.master')

@section('main-content')
<div class="page-content">

    <div class="row justify-content-center">
        

        <form action="{{ route('generalSetting.store') }}" method="POST">
            @csrf

            <div class="row">

               
             
               
              
                <!-- Marketing Settings -->
                <div class="col-md-6 mb-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Marketing</h5>
                            <div class="form-group mb-3">
                                <label for="facebookPixel">Facebook Pixel</label>
                                <input type="text" class="form-control" id="facebookPixel" name="facebook_pixel" value="{{ old('facebook_pixel', getGeneralSetting()->facebook_pixel) }}" placeholder="Enter Facebook Pixel ID">
                                @error('facebook_pixel')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="tagManager">Tag Manager</label>
                                <input type="text" class="form-control" id="tagManager" name="tag_manager" value="{{ old('tag_manager', getGeneralSetting()->tag_manager) }}" placeholder="Enter Tag Manager ID">
                                @error('tag_manager')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="googleAnalytics">Google Analytics</label>
                                <input type="text" class="form-control" id="googleAnalytics" name="google_analytics" value="{{ old('google_analytics', getGeneralSetting()->google_analytics) }}" placeholder="Enter Google Analytics ID">
                                @error('google_analytics')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="domainVerification">Domain Verification</label>
                                <input type="text" class="form-control" id="domainVerification" name="domain_verification" value="{{ old('domain_verification', getGeneralSetting()->domain_verification) }}" placeholder="Enter Domain Verification Code">
                                @error('domain_verification')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col-md-12">
                <button class="btn btn-primary w-50 btn-lg" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle mr-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"></path>
                      </svg>
            
                    Save Setting
                </button>
            </div>
        </form>


        
    </div>
</div>
@endsection
