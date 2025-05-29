<div class="sidebar">
    <div class="sidebar-wrapper">
        <ul class="nav">
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                  </span>
                  <span class="menu-title">Products</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/view_product') }}">Add Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/show_product')}}">Show Products</a></li>
                  </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-list"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/order') }}">
                    <i class="fas fa-list"></i>
                    <p>Order</p>
                </a>
            </li>
            @endauth
        </ul>
    </div>
</div>
