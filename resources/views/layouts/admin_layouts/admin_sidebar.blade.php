  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('images/admin_images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Ecommerce Platform</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('images/admin_images/admin_profile/' . Auth::guard('admin')->user()->image) }}"
                      class="img-circle elevation-2" alt="User Image">

              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ ucfirst(Auth::guard('admin')->user()->name) }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                  
                  <li class="nav-item">
                      <a href="{{ route('dashboard') }}" class="nav-link ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard

                          </p>
                      </a>
                  </li>
                  {{-- settings section --}}
                  
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Settings
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('settings') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Update Admin Password</p>
                              </a>
                          </li>
                          
                          <li class="nav-item">
                              <a href="{{ route('admin_details_update') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Update Admin Details</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                 
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Catalogues
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>

                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('section') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sections</p>
                              </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('brands') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brands</p>
                            </a>
                        </li>
                        
                          <li class="nav-item">
                              <a href="{{ route('category') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Categories</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{ route('products') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Products</p>
                              </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('coupons.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Coupons</p>
                            </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer_orders')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('shipping_charges')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Shipping Charges</p>
                                </a>
                            </li>
                      </ul>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
