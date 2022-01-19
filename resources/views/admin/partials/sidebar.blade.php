<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="/admin/dashboard">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                    height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">Bitecom Dashboard</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                <li class="has-sub {{ Route::is('brand.index') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#brands" aria-expanded="false" aria-controls="brands">
                        <i class="mdi mdi-shopping"></i>
                        <span class="nav-text">Brands</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="brands" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="{{ Route::is('brand.index') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('brand.index') }}">
                                    <i class="mdi mdi-shopping mr-2"></i>
                                    <span class="nav-text">Brand Lists</span>
                                </a>
                            </li>

                            <li class="{{ Route::is('brand.create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('brand.create') }}">
                                    <i class="mdi mdi-library-plus mr-2"></i>
                                    <span class="nav-text">Add Brand</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="has-sub {{ Route::is('category.index') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#categories" aria-expanded="false" aria-controls="categories">
                        <i class="mdi mdi-book-multiple"></i>
                        <span class="nav-text">Categories</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="categories" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="{{ Route::is('category.index') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('category.index') }}">
                                    <i class="mdi mdi-book-multiple mr-2"></i>
                                    <span class="nav-text">Category Lists</span>
                                </a>
                            </li>

                            <li class="{{ Route::is('category.create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('category.create') }}">
                                    <i class="mdi mdi-library-plus mr-2"></i>
                                    <span class="nav-text">Add Category</span>
                                </a>
                            </li>

                            <li class="{{ Route::is('sub.category.index') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('sub.category.index') }}">
                                    <i class="mdi mdi-book-multiple mr-2"></i>
                                    <span class="nav-text">Sub Category Lists</span>
                                </a>
                            </li>

                            <li class="{{ Route::is('sub.category.create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('sub.category.create') }}">
                                    <i class="mdi mdi-library-plus mr-2"></i>
                                    <span class="nav-text">Add Sub Category</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="has-sub {{ Route::is('products.index') ? 'active' : '' }} {{ Route::is('products.create') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#products" aria-expanded="false" aria-controls="products">
                        <i class="mdi mdi-gift"></i>
                        <span class="nav-text">Products</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="products" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="{{ Route::is('Products.index') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('products.index') }}">
                                    <i class="mdi mdi-gift mr-2"></i>
                                    <span class="nav-text">Product Lists</span>
                                </a>
                            </li>

                            <li class="{{ Route::is('Products.create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('products.create') }}">
                                    <i class="mdi mdi-library-plus mr-2"></i>
                                    <span class="nav-text">Add Product</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="has-sub {{ Route::is('sliders.index') ? 'active' : '' }} {{ Route::is('sliders.create') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#sliders" aria-expanded="false" aria-controls="sliders">
                        <i class="mdi mdi-image-area"></i>
                        <span class="nav-text">Sliders</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="sliders" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="{{ Route::is('sliders.index') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('sliders.index') }}">
                                    <i class="mdi mdi-image-area mr-2"></i>
                                    <span class="nav-text">Slider Lists</span>
                                </a>
                            </li>

                            <li class="{{ Route::is('sliders.create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('sliders.create') }}">
                                    <i class="mdi mdi-library-plus mr-2"></i>
                                    <span class="nav-text">Add Slider</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="has-sub {{ Route::is('pending-orders') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#orders" aria-expanded="false" aria-controls="orders">
                        <i class="mdi mdi-image-area"></i>
                        <span class="nav-text">Orders</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="orders" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="{{ Route::is('pending-orders') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('pending-orders') }}">
                                    <i class="mdi mdi-image-area mr-2"></i>
                                    <span class="nav-text">Orders List</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="{{ Route::is('confirmed-orders') ? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>

                <li class="{{ Route::is('processing-orders') ? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>

                <li class="{{ Route::is('picked-orders') ? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Orders</a></li>

                <li class="{{ Route::is('shipped-orders') ? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Shipped Orders</a></li>

                <li class="{{ Route::is('delivered-orders') ? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>

                <li class="{{ Route::is('cancel-orders') ? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Cancel Orders</a></li>

                <li class="{{ Route::is('all-reports') ? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a></li>

            </ul>
        </div>
    </div>
</aside>
