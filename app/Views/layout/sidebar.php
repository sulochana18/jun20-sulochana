<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>/dashboard" class="brand-link">
      <img src="<?= base_url() ?>/public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Shopping</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library  menu-open  -->      
          <li class="nav-item">
            <a href="<?= base_url() ?>/dashboard" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Dashboard
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>               
          <li class="nav-item">
            <a href="<?= base_url() ?>/categories-list" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>        
          <li class="nav-item">
            <a href="<?= base_url() ?>/subcategories-list" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Sub Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/products-list" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="<?= base_url() ?>/order-list" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/slider-list" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li> 
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>