<div class="">
  <nav class="navbar navbar-expand-lg navbar-light custom-navbar ">
    <div class="container-fluid">
      <div class="row">
        <div class="">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto wsus_menu_cat_item active">
              <!-- Home -->
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('frontend.home') }}">Home</a>
              </li>
      
              <!-- Desktop -->
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="desktopDropdown">Desktop</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item">Gaming Desktop</li>
                  <li class="dropdown-item has-arrow">
                    Workstation
                    <!-- Child category for Workstation -->
                    <ul class="child-menu">
                      <li><a href="#">CAD Workstation</a></li>
                      <li><a href="#">3D Modeling Workstation</a></li>
                      <li><a href="#">Editing Workstation</a></li>
                    </ul>
                  </li>
                  <li class="dropdown-item">All-in-One</li>
                </ul>
              </li>
      
              <!-- Laptop -->
              <li class="nav-item dropdown ">
                <a class="nav-link" href="#" id="laptopDropdown">Laptop</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item">Gaming Laptop</li>
                  <li class="dropdown-item has-arrow">
                    Business Laptop
                    <ul class="child-menu">
                      <li><a href="#">Office Laptop</a></li>
                      <li><a href="#">Student Laptop</a></li>
                    </ul>
                  </li>
                  <li class="dropdown-item">Ultrabook</li>
                </ul>
              </li>
      
              <!-- Monitor -->
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="monitorDropdown">Monitor</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item has-arrow">
                    MSI
                    <ul class="child-menu">
                      <li><a href="#">Curved Monitor</a></li>
                      <li><a href="#">Gaming Monitor</a></li>
                    </ul>
                  </li>
                  <li class="dropdown-item">Samsung</li>
                  <li class="dropdown-item">LG</li>
                </ul>
              </li>
      
              <!-- Other items -->
              <li class="nav-item"><a class="nav-link" href="#">UPS</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Phone</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Tablet</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>

