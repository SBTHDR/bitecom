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
                <span class="brand-name">Qulecom Dashboard</span>
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

                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                        aria-expanded="false" aria-controls="pages">
                        <i class="mdi mdi-image-filter-none"></i>
                        <span class="nav-text">Pages</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="pages" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li>
                                <a class="sidenav-item-link" href="user-profile.html">
                                    <span class="nav-text">User Profile</span>

                                </a>
                            </li>

                            <li class="has-sub">
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                    data-target="#authentication" aria-expanded="false" aria-controls="authentication">
                                    <span class="nav-text">Authentication</span> <b class="caret"></b>
                                </a>
                                <ul class="collapse" id="authentication">
                                    <div class="sub-menu">

                                        <li>
                                            <a href="sign-in.html">Sign In</a>
                                        </li>

                                        <li>
                                            <a href="sign-up.html">Sign Up</a>
                                        </li>

                                    </div>
                                </ul>
                            </li>

                        </div>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</aside>
