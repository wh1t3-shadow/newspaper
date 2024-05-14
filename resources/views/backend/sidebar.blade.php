<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end"></span>
                        <span>admin Dashboards </span>
                    </a>
                </li>
                <li class="menu-title mt-2">
                    Apps
                </li>
                <li>
                    <a href="#sidebarBlog" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Blog Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBlog">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{url('/blogs-show')}}">All Blogs</a>
                            </li>
                            <li>
                                <a href="{{url('/create-post')}}">add Blogs</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#profile" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>profile Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="profile">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{url('/profile')}}">profile</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#logout" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> logout</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="logout">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{url('/logout')}}">logout</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        </li>
        </ul>
    </div>

    <div class="clearfix"></div>
</div>

<!-- Sidebar -left -->

</div>
