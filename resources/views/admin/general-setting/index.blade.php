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

        <!-- Basic Information -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">Basic Information</h5>
                    <div class="form-group mb-3">
                        <label for="siteTitle">Site Title</label>
                        <input type="text" class="form-control" id="siteTitle" name="site_title" value="My eCommerce Store" placeholder="Enter site title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="homePageTitle">Home Page Title</label>
                        <input type="text" class="form-control" id="homePageTitle" name="home_page_title" value="" placeholder="Enter home page title">
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
                        <input type="text" class="form-control" id="whatsappNumber" name="whatsapp_number" value="+880123456789" placeholder="Enter WhatsApp number">
                    </div>
                    <div class="form-group mb-3">
                        <label for="storeEmail">Store Email</label>
                        <input type="email" class="form-control" id="storeEmail" name="store_email" value="store@example.com" placeholder="Enter store email">
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
                        <input type="text" class="form-control" id="facebookIframe" name="facebook_iframe" &lt;iframe="" src="&quot;facebook.com/embed&quot;></iframe>" placeholder="Enter Facebook iframe">
                    </div>
                    <div class="form-group mb-3">
                        <label for="shopAddress">Shop Address</label>
                        <input type="text" class="form-control" id="shopAddress" name="shop_address" 123,="" dhaka,="" bangladesh="" placeholder="Enter shop address">
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
                        <input type="text" class="form-control" id="siteMetaKeywords" name="site_meta_keywords" value="eCommerce, online store, shopping" placeholder="Enter site meta keywords">
                    </div>
                    <div class="form-group mb-3">
                        <label for="siteMetaDescription">Site Meta Description</label>
                        <input type="text" class="form-control" id="siteMetaDescription" name="site_meta_description" value="This is an amazing online store." placeholder="Enter site meta description">
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
                        <input type="text" class="form-control" id="facebookPixel" name="facebook_pixel" value="FB_PIXEL_CODE" placeholder="Enter Facebook Pixel ID">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tagManager">Tag Manager</label>
                        <input type="text" class="form-control" id="tagManager" name="tag_manager" value="TAG_MANAGER_CODE" placeholder="Enter Tag Manager ID">
                    </div>
                    <div class="form-group mb-3">
                        <label for="googleAnalytics">Google Analytics</label>
                        <input type="text" class="form-control" id="googleAnalytics" name="google_analytics" value="GA_TRACKING_ID" placeholder="Enter Google Analytics ID">
                    </div>
                    <div class="form-group mb-3">
                        <label for="domainVerification">Domain Verification</label>
                        <input type="text" class="form-control" id="domainVerification" name="domain_verification" value="VERIFICATION_CODE" placeholder="Enter Domain Verification Code">
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
                        <input type="text" class="form-control" id="facebook" name="facebook_url" value="https://facebook.com/store" placeholder="Facebook URL">
                    </div>
                    <div class="form-group mb-3">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram_url" value="https://instagram.com/store" placeholder="Instagram URL">
                    </div>
                    <div class="form-group mb-3">
                        <label for="youtube">YouTube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube_url" value="https://youtube.com/store" placeholder="YouTube URL">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tiktok">TikTok</label>
                        <input type="text" class="form-control" id="tiktok" name="tiktok_url" value="https://tiktok.com/store" placeholder="TikTok URL">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Twitter">Twitter</label>
                        <input type="text" class="form-control" id="Twitter" name="twitter_url" value="https://twitter.com/store" placeholder="Twitter URL">
                    </div>
                </div>
            </div>
        </div>
        <!-- Appearance & Stock Settings -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">Appearance &amp; Stock Settings</h5>
                    <div class="form-group mb-3">
                        <label for="primaryColor">Primary Color</label>
                        <input type="color" class="form-control" id="primaryColor" name="primary_color" value="#FF5733">
                    </div>
                    <div class="form-group mb-3">
                        <label for="stockAlertQuantity">Stock Alert Quantity</label>
                        <input type="number" class="form-control" id="stockAlertQuantity" name="stock_alert_quantity" value="5" placeholder="Enter stock alert quantity">
                    </div>

                    <div class="form-group mb-3">
                        <label for="insideDeliveryCharge">Delivery Charge (Inside Dhaka)</label>
                        <input type="number" name="delivery_charge_inside_dhaka" class="form-control" id="insideDeliveryCharge" value="60.00" placeholder="Enter delivery charge inside Dhaka">
                    </div>
                    <div class="form-group mb-3">
                        <label for="outsideDeliveryCharge">Delivery Charge (Outside Dhaka)</label>
                        <input type="number" name="delivery_charge_outside_dhaka" class="form-control" id="outsideDeliveryCharge" value="120.00" placeholder="Enter delivery charge outside Dhaka">
                    </div>
                </div>
            </div>
        </div>
        <!-- Chat Bot Option -->
        <div class="col-md-6 my-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">Chat Bot Option</h5>
                    <div class="form-group mb-3">
                        <label for="messengerBot">Messenger Bot</label>
                        <input type="text" class="form-control" id="messengerBot" name="messenger_bot" value="1" placeholder="Messenger Bot Integration Code">
                    </div>
                    <div class="form-group mb-3">
                        <label for="whatsAppBot">WhatsApp Bot</label>
                        <input type="text" class="form-control" id="whatsAppBot" name="whatsapp_bot" value="1" placeholder="WhatsApp Bot Integration Code">
                    </div>
                </div>
            </div>
        </div>
        <!-- Save Button -->
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg px-5">Save Settings</button>
        </div>
    </div>
    <!--end row-->







</div>
@endsection
