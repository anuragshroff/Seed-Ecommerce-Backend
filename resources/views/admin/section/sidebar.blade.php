<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('dashboard')}}">
                <div class="parent-icon"><img src="{{asset('assets/static/dashboard.webp')}}" style="width: 30px; height: 30px" />
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>

        <li>
            <a href="{{route('order')}}">
                <div class="parent-icon"><img src="{{asset('assets/static/dashboard.webp')}}" style="width: 30px; height: 30px" />
                </div>
                <div class="menu-title">Order</div>
            </a>

        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><img src="{{asset('assets/static/dashboard.webp')}}" style="width: 30px; height: 30px" />
                </div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li> <a href="{{route('product.index')}}">
                        <i class='bx bx-radio-circle'></i>
                        All Products
                    </a>
                </li>

                <li> <a href="{{route('product.create')}}">
                        <i class='bx bx-radio-circle'></i>
                        Create Products
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><img src="{{asset('assets/static/dashboard.webp')}}" style="width: 30px; height: 30px" />
                </div>
                <div class="menu-title">Attribute</div>
            </a>
            <ul>
                <li> <a href="{{route('attribute.index')}}">
                        <i class='bx bx-radio-circle'></i>
                        List of Attribute
                    </a>
                </li>

                <li> <a href="{{route('attribute.create')}}">
                        <i class='bx bx-radio-circle'></i>
                        Add Attribute
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><img src="{{asset('assets/static/dashboard.webp')}}" style="width: 30px; height: 30px" />
                </div>
                <div class="menu-title">Report</div>
            </a>
            <ul>
                <li> <a href="{{route('report')}}">
                        <i class='bx bx-radio-circle'></i>
                        Order Report
                    </a>
                </li>

                <li> <a href="{{route('saleReport')}}">
                        <i class='bx bx-radio-circle'></i>
                        Sale Report
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><img src="{{asset('assets/static/dashboard.webp')}}" style="width: 30px; height: 30px" />
                </div>
                <div class="menu-title">Inventory</div>
            </a>
            <ul>
                <li> <a href="{{route('stock')}}">
                        <i class='bx bx-radio-circle'></i>
                        Stock
                    </a>
                </li>

                <li> <a href="{{route('stockOutProducts')}}">
                        <i class='bx bx-radio-circle'></i>
                        Stock Out Products
                    </a>
                </li>

                <li> <a href="{{route('upcomingStockOutProducts')}}">
                    <i class='bx bx-radio-circle'></i>
                    Upcoming Stock Out Products
                </a>
            </li>


            </ul>
        </li>

        <li>
            <a href="{{route('customerInfo')}}">
                <div class="parent-icon"><img src="{{asset('assets/static/dashboard.webp')}}" style="width: 30px; height: 30px" />
                </div>
                <div class="menu-title">Customer Information</div>
            </a>

        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><img src="{{asset('assets/static/dashboard.webp')}}" style="width: 30px; height: 30px" />
                </div>
                <div class="menu-title">API Setting</div>
            </a>
            <ul>
                <li> <a href="{{route('couriarApi')}}">
                        <i class='bx bx-radio-circle'></i>
                        Couriar Api
                    </a>
                </li>


            </ul>
        </li>




    </ul>
    <!--end navigation-->
</div>
