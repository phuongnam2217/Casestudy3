<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{route('admin.dashboard')}}" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Manage</li>
                <li>
                    <a href="{{route('users.index')}}">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Manage Users
                    </a>
                </li>
                <li>
                    <a href="{{route('categories.index')}}">
                        <i class="metismenu-icon pe-7s-bookmarks"></i>
                        Manage Category
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Manage Product
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('products.index')}}">
                                <i class="metismenu-icon"></i>
                                Products List
                            </a>
                        </li>
                        <li>
                            <a href="{{route('products.create')}}">
                                <i class="metismenu-icon">
                                </i>Create New Product
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Manage Order
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('orders.index',\App\Http\Controllers\StatusOrderConst::WAITING)}}">
                                <i class="metismenu-icon"></i>
                                Orders Waiting
                            </a>
                        </li>
                        <li>
                            <a href="{{route('orders.index',\App\Http\Controllers\StatusOrderConst::SHIPPING)}}">
                                <i class="metismenu-icon">
                                </i>Orders Shipping
                            </a>
                        </li>
                        <li>
                            <a href="{{route('orders.index',\App\Http\Controllers\StatusOrderConst::SUCCESS)}}">
                                <i class="metismenu-icon">
                                </i>Orders Success
                            </a>
                        </li>
                        <li>
                            <a href="{{route('orders.index',\App\Http\Controllers\StatusOrderConst::CANCEL)}}">
                                <i class="metismenu-icon">
                                </i>Orders Cancel
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Manage Customers
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('customers.index')}}">
                                <i class="metismenu-icon"></i>
                                Customers List
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
