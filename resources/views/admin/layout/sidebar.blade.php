 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
          </li>
        @if(Auth::guard('admin')->user()->type == "superAdmin")
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="settings">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.update.password')}}">Update admin password</a></li>
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.update.details')}}">Update admin details</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admins" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-account-multiple  menu-icon"></i>
              <span class="menu-title">Admins Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admins">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.show.admins', 'superAdmin')}}">Super Admins</a></li>
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.show.admins', 'vendor')}}">Vendors</a></li>
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.show.admins', 'subAdmin')}}">Sub Admins</a></li>
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.show.admins', '')}}">All</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#catalogue" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-apps menu-icon"></i>
              <span class="menu-title">Catalogue Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="catalogue">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.sections')}}">Sections</a></li>
                  <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.category.index')}}">Categories</a></li>
                  <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.brand.index')}}">Brands</a></li>
                  <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('admin.product.index')}}">Products</a></li>
              </ul>
            </div>
          </li>
        @elseif(Auth::guard('admin')->user()->type == "vendor")
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Vendor Details</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('update.vendor.details', 'personal')}}">Personal Details</a></li>
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('update.vendor.details', 'business')}}">Business Details</a></li>
                <li class="nav-item"> <a class="nav-link text-wrap" href="{{route('update.vendor.details', 'bank')}}">Bank Details</a></li>
              </ul>
            </div>
          </li>

        @endif
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
