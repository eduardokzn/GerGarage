<!-- PRIVATE MENU -->

    <!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">

      <a class="navbar-brand" href="admin.php">
        <img src="./img/DarkAlien.png" alt="logo" style="width:60px;">
      </a>
        
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <!-- wrapper for collapsing nav bar -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
          
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php echo "$menuActive_home"; ?>" href="admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo "$menuActive_privatepage1"; ?>" href="admBookings.php">Bookings</a>
        </li>
<!--        <li class="nav-item">
          <a class="nav-link <?php echo "$menuActive_privatepage2"; ?>" href="privatePage2.php">Ajax jQuery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo "$menuActive_privatepage3"; ?>" href="privatePage3.php">Ajax Database</a>
        </li>-->
      </ul> 
        
      <ul class="nav nav-button ml-auto">
        <li><button class="btn btn-warning" type="button" onclick="location.href='logout.php'">Sign Out <i class="fa fa-arrow-circle-right ml-2"></i></button></li>
      </ul>
          
      </div><!-- END: menu collapse wrapper-->
        
    </nav>           
        
