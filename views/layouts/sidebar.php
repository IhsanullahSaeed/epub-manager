<aside class="left-sidebar bg-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a href="/index.html">
        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
          <g fill="none" fill-rule="evenodd">
            <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
          </g>
        </svg>
        <span class="brand-name">Epub Manager</span>
      </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-scrollbar">

      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">
      <?php 
        $directoryURI = $_SERVER['REQUEST_URI'];
        $path = parse_url($directoryURI, PHP_URL_PATH);
        $components = explode('/', $path); 
        $first_part = basename($_SERVER['PHP_SELF'], ".php"); 
      ?>

        <li class="has-sub <?php if ($first_part=="dashboard") {echo "active"; }?>">
          <a class="sidenav-item-link" href="./dashboard.php">
            <i class="mdi mdi-view-dashboard-outline"></i>
            <span class="nav-text">Dashboard</span>
            <!-- <b class="caret"></b> -->
          </a>
        </li>
        <li class="has-sub <?php if ($first_part=="books") {echo "active"; } ?>">
          <a class="sidenav-item-link" href="./books.php">
            <i class="mdi mdi-library-books"></i>
            <span class="nav-text">Books</span>
          </a>
        </li>

        <?php 
          $user = new User();
          $user_id = Session::get("user_id");
          $user->find($user_id);
          if($user->admin == 1){

          
        ?>
        <li class="has-sub <?php if ($first_part=="manage-books") {echo "active"; } ?>">
          <a class="sidenav-item-link" href="./manage-books.php">
            <i class="mdi mdi-pencil-box-multiple"></i>
            <span class="nav-text">Manage Books</span>
          </a>

        </li>
        <li class="has-sub <?php if ($first_part=="manage-action") {echo "active"; }  ?>">
          <a class="sidenav-item-link" href="./manage-action.php">
            <i class="mdi  mdi-plus-circle"></i>
            <span class="nav-text">Manage Actions</span>
          </a>
        </li>
        <li class="has-sub <?php if ($first_part=="manage-status") {echo "active"; } ?>">
          <a class="sidenav-item-link" href="./manage-status.php">
            <i class=" mdi mdi-account-alert"></i>
            <span class="nav-text">Manage Status</span> 
          </a>
        </li>
        <li class="has-sub <?php if ($first_part=="manage-users") {echo "active"; } ?>">
          <a class="sidenav-item-link" href="./manage-users.php">
            <i class="mdi mdi-account-multiple-plus"></i>
            <span class="nav-text">Manage Users</span> 
          </a>
        </li>
        <li class="has-sub <?php if ($first_part=="manage-department") {echo "active"; } ?>">
          <a class="sidenav-item-link" href="./manage-department.php">
            <i class="mdi mdi-office"></i>
            <span class="nav-text">Manage Departments</span> 
          </a>
        </li>
        <li class="has-sub <?php if ($first_part=="manage-excel") {echo "active"; } ?>">
          <a class="sidenav-item-link" href="./manage-excel.php">
            <i class="mdi mdi-run"></i>
            <span class="nav-text">Excel Book Import</span>
          </a>
        </li>


        <?php 
          }
        ?>
      </ul>

    </div>
    <?php
      $book = new Book();
      $total_books_uk = $book->where("book_origin","uk")->get(); 
      $count_total_uk = count($total_books_uk);
      $completed_books_uk = $book->where("status_id","12")->where("book_origin","uk")->get();
      $count_uk = count($completed_books_uk); 
      $percentage_uk = ($count_uk*100)/$count_total_uk;
      
      $book_usa = new Book();
      $total_books_usa = $book_usa->where("book_origin","usa")->get();
      $count_total_usa = count($total_books_usa);
      $completed_books_usa = $book_usa->where("status_id", "12")->where("book_origin","usa")->get();
      $count_usa = count($completed_books_usa); 
      $percentage_usa = ($count_usa*100)/$count_total_usa;

      $book_uae = new Book();
      $total_books_uae = $book_uae->where("book_origin","uae")->get();
      $count_total_uae = count($total_books_uae);
      $completed_books_uae = $book_uae->where("status_id", "12")->where("book_origin","uae")->get();
      $count_uae = count($completed_books_uae); 
      $percentage_uae = ($count_uae*100)/$count_total_uae;
    ?>
    <div class="sidebar-footer">
      <hr class="separator mb-0" />
      <div class="sidebar-footer-content">
        <h6 class="text-uppercase">
          UK Books <span class="float-right"><?php echo $percentage_uk ."%"; ?></span>
        </h6>
        <div class="progress progress-xs">
          <div class="progress-bar bg-success" style="width: <?php echo $percentage_uk ."%"; ?>;" role="progressbar"></div>
        </div>
        <h6 class="text-uppercase">
          USA Books <span class="float-right"><?php echo $percentage_usa ."%"; ?></span>
        </h6>
        <div class="progress progress-xs">
          <div class="progress-bar bg-warning" style="width:<?php echo $percentage_usa ."%"; ?>" role="progressbar"></div>
        </div>
        <h6 class="text-uppercase">
          UAE Books <span class="float-right"><?php echo $percentage_uae ."%"; ?></span>
        </h6>
        <div class="progress progress-xs">
          <div class="progress-bar bg-danger" style="width: <?php echo $percentage_uae ."%"; ?>;" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
</aside>

