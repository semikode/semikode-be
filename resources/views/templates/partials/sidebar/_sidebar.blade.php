<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            <img src="{{ asset('assets/images/user.png') }}" alt="image"/>
            <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
          </div>
          <div class="profile-name">
            <p class="name">
                
            </p>
            <p class="designation">
             
            </p>
          </div>
        </div>
      </li>
      <li id="dashboard" class="nav-item">
        <a class="nav-link" href="#">
          <i class="icon-rocket menu-icon"></i>
          <span class="menu-title">Dashboard</span>
          <span class="badge badge-success"></span>
        </a>
      </li>

      
      <li id="user" class="nav-item">
        <a class="nav-link" href="#">
          <i class="icon-people menu-icon"></i>
          <span class="menu-title">Data User</span>
          <span class="badge badge-success"></span>
        </a>
      </li>

      <li id="blog" class="nav-item">
        <a class="nav-link" href="{{route('category')}}">
          <i class="icon-list menu-icon"></i>
          <span class="menu-title">Category</span>
          <span class="badge badge-info"></span>
        </a>
        
      </li>

      <li id="galeri" class="nav-item">
        <a class="nav-link" href="{{route('client')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Data Client</span>
          <span class="badge badge-info"></span>
        </a>
        
      </li>

      <li id="akademik" class="nav-item">
        <a class="nav-link" href="{{route('contact')}}">
          <i class="icon-notebook menu-icon"></i>
          <span class="menu-title">Data Contact</span>
          <span class="badge badge-info"></span>
        </a>
        
      </li>

      <li id="menuprofil" class="nav-item">
        <a class="nav-link" href="{{route('service')}}">
          <i class="icon-notebook menu-icon"></i>
          <span class="menu-title">Data Service</span>
          <span class="badge badge-info"></span>
        </a>
        
      </li>

      <li id="menuppdb" class="nav-item">
        <a class="nav-link" href="{{route('service')}}">
          <i class="icon-globe menu-icon"></i>
          <span class="menu-title">Data Portofolio</span>
          <span class="badge badge-info"></span>
        </a>
        
      </li>

      
      

    </ul>
  </nav>
  <!-- partial -->
