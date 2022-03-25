<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('uploads/users/' . auth()->user()->image) }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <!--Dashboard-->
            <li class="nav-item has-treeview">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>

            </li>

            <!--Basic Setup-->
            {{-- <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>
                        Basic Setup
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <!--Facility-->
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-tint"></i>
                            <p>Facility</p>
                        </a>
                    </li>

                    <!--Room Type-->
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Room Type</p>
                        </a>
                    </li>



                </ul>
            </li> --}}


            <!--Rooms-->
            <li class="nav-item has-treeview">
                <a href="{{ route('backend.post.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Posts
                    </p>
                </a>

            </li>

            <!--Room Owner-->
            <li class="nav-item has-treeview">
                <a href="{{ route('backend.user.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>

                    <p>
                        Users

                    </p>
                </a>

            </li>

            <!--Room Owner-->
            <li class="nav-item has-treeview">
                <a href="{{ route('backend.category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>

                    <p>
                        Category

                    </p>
                </a>

            </li>




            <li class="nav-item has-treeview">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                    class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </li>







        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
