<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">
    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}" data-widget="treeview" role="menu" @if(config('adminlte.sidebar_nav_animation_speed') !=300) data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}" @endif @if(!config('adminlte.sidebar_nav_accordion')) data-accordion="false" @endif>
                {{-- Configured sidebar links --}}
                <li class="nav-item has-treeview">
                    <a class="nav-link" href="#">
                        <i class="fa fa-book"></i>
                        <p>
                            Inventaris Barang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/inventaris')}}">
                                <i class="fas fa-boxes"></i>
                                <p>Data inventaris</p>
                            </a>
                        </li>
                        @if(Auth::user()->role != 'anggota')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/kategori')}}">
                                <i class="fas fa-tags"></i>
                                <p>Data kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/gedung')}}">
                                <i class="fas fa-building"></i>
                                <p>Data gedung</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-search"></i>
                        <p>Search</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-rss"></i>
                        <p>Blog</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user"></i>
                        <p>Account Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"">
                        <i class="fas fa-lock"></i>
                        <p>Change Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-tags" style="color: red;"></i>
                        <p>Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-exclamation-triangle" style="color: yellow;"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-info-circle" style="color: cyan;"></i>
                        <p>Information</p>
                    </a>
                </li>
                {{-- End configured sidebar links --}}
            </ul>
        </nav>
    </div>
</aside>
