@extends('admin.master')

@section('main-content')
<div class="page-content">

    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card-header text-center mb-4" style="font-weight: 700; font-size: 2.5rem;  letter-spacing: 1px;">
                General Settings
            </div>
            <hr class="mx-auto" style="width: 60px; border-top: 3px solid #007bff;">
        </div>

        <form action="{{ route('generalSetting.store') }}" method="POST">
            @csrf

            <div class="row">

                <!-- Basic Information -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Basic Information</h5>
                            <div class="form-group mb-3">
                                <label for="siteTitle">Site Title</label>
                                <input type="text" class="form-control" id="siteTitle" name="site_title" value="{{ old('site_title', $setting->site_title) }}" placeholder="Enter site title">
                                @error('site_title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="homePageTitle">Home Page Title</label>
                                <input type="text" class="form-control" id="homePageTitle" name="home_page_title" value="{{ old('home_page_title', $setting->home_page_title) }}" placeholder="Enter home page title">
                                @error('home_page_title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Information -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Contact Information</h5>
                            <div class="form-group mb-3">
                                <label for="whatsappNumber">WhatsApp Number</label>
                                <input type="text" class="form-control" id="whatsappNumber" name="whatsapp" value="{{ old('whatsapp', $setting->whatsapp) }}" placeholder="Enter WhatsApp number">
                                @error('whatsapp')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="storeEmail">Store Email</label>
                                <input type="email" class="form-control" id="storeEmail" name="store_email" value="{{ old('store_email', $setting->store_email) }}" placeholder="Enter store email">
                                @error('store_email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Store Details -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Store Details</h5>
                            <div class="form-group mb-3">
                                <label for="facebookIframe">Facebook Iframe</label>
                                <input type="text" class="form-control" id="facebookIframe" name="facebook_iframe" value="{{ old('facebook_iframe', $setting->facebook_iframe) }}" placeholder="Enter Facebook iframe">
                                @error('facebook_iframe')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="shopAddress">Shop Address</label>
                                <input type="text" class="form-control" id="shopAddress" name="shop_address" value="{{ old('shop_address', $setting->shop_address) }}" placeholder="Enter shop address">
                                @error('shop_address')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEO Settings -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">SEO Settings</h5>
                            <div class="form-group mb-3">
                                <label for="siteMetaKeywords">Site Meta Keywords</label>
                                <input type="text" class="form-control" id="siteMetaKeywords" name="site_meta_keyword" value="{{ old('site_meta_keyword', $setting->site_meta_keyword) }}" placeholder="Enter site meta keywords">
                                @error('site_meta_keyword')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="siteMetaDescription">Site Meta Description</label>
                                <input type="text" class="form-control" id="siteMetaDescription" name="site_meta_description" value="{{ old('site_meta_description', $setting->site_meta_description) }}" placeholder="Enter site meta description">
                                @error('site_meta_description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Marketing Settings -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Marketing</h5>
                            <div class="form-group mb-3">
                                <label for="facebookPixel">Facebook Pixel</label>
                                <input type="text" class="form-control" id="facebookPixel" name="facebook_pixel" value="{{ old('facebook_pixel', $setting->facebook_pixel) }}" placeholder="Enter Facebook Pixel ID">
                                @error('facebook_pixel')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="tagManager">Tag Manager</label>
                                <input type="text" class="form-control" id="tagManager" name="tag_manager" value="{{ old('tag_manager', $setting->tag_manager) }}" placeholder="Enter Tag Manager ID">
                                @error('tag_manager')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="googleAnalytics">Google Analytics</label>
                                <input type="text" class="form-control" id="googleAnalytics" name="google_analytics" value="{{ old('google_analytics', $setting->google_analytics) }}" placeholder="Enter Google Analytics ID">
                                @error('google_analytics')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="domainVerification">Domain Verification</label>
                                <input type="text" class="form-control" id="domainVerification" name="domain_verification" value="{{ old('domain_verification', $setting->domain_verification) }}" placeholder="Enter Domain Verification Code">
                                @error('domain_verification')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social Links -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Social Links</h5>
                            <div class="form-group mb-3">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $setting->facebook) }}" placeholder="Facebook URL">
                                @error('facebook')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $setting->instagram) }}" placeholder="Instagram URL">
                                @error('instagram')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="youtube">YouTube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', $setting->youtube) }}" placeholder="YouTube URL">
                                @error('youtube')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="tiktok">TikTok</label>
                                <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ old('tiktok', $setting->tiktok) }}" placeholder="TikTok URL">
                                @error('tiktok')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ old('twitter', $setting->twitter) }}" placeholder="Twitter URL">
                                @error('twitter')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Appearance &amp; Stock Settings</h5>
                            <div class="form-group mb-3">
                                <label for="primaryColor">Primary Color</label>
                                <input type="color" class="form-control" id="primaryColor" name="primary_color" value="{{ old('primary_color', $setting->primary_color) }}">

                                @error('primary_color')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="form-group mb-3">
                                <label for="stockAlertQuantity">Stock Alert Quantity</label>
                                <input type="number" class="form-control" id="stockAlertQuantity" name="stock_alert"  value="{{ old('stock_alert', $setting->stock_alert) }}" >

                                @error('stock_alert')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="form-group mb-3">
                                <label for="insideDeliveryCharge">Delivery Charge (Inside Dhaka)</label>
                                <input type="number" name="delivery_charge_inside" class="form-control" id="insideDeliveryCharge"  value="{{ old('delivery_charge_inside', $setting->delivery_charge_inside) }}" >

                                @error('delivery_charge_inside')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="form-group mb-3">
                                <label for="outsideDeliveryCharge">Delivery Charge (Outside Dhaka)</label>
                                <input type="number" name="delivery_charge_outside" class="form-control" id="outsideDeliveryCharge"  value="{{ old('delivery_charge_outside', $setting->delivery_charge_outside) }}" >

                                @error('delivery_charge_outside')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12 mb-4">
                <button class="btn btn-primary w-100 btn-lg" type="submit">
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
