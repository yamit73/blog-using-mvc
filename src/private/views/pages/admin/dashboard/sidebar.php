<?php
global $settings;
?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark p-3 sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column mt-5">
      <li class="nav-item">
        <a class="nav-link text-success h4" aria-current="page" href="#">
          <span data-feather="home"></span>
            <?php echo ucwords($_SESSION['userdata']['user_name']); ?>
        </a>
      </li>
        <?php
        if ($_SESSION['userdata']['role']=='reader') {
            echo '<li class="nav-item">
                    <a class="nav-link" href="'.$settings['siteurl'].'/admin/dashboard&currentSection=myprofile">
                      <span data-feather="file"></span>
                      My profile
                    </a>
                  </li>';
        } elseif ($_SESSION['userdata']['role']=='admin') {
            echo '<li class="nav-item">
                    <a class="nav-link" href="'.$settings['siteurl'].'/admin/dashboard&role=admin&currentSection=users">
                      <span data-feather="file"></span>
                      Users
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="'.$settings['siteurl'].'/admin/dashboard&role=admin&currentSection=blogs">
                      <span data-feather="file"></span>
                      Blogs
                    </a>
                  </li>';
        } elseif ($_SESSION['userdata']['role']=='writer') {
            echo '<li class="nav-item">
                    <a class="nav-link" href="'.$settings['siteurl'].'/admin/dashboard&currentSection=myprofile">
                      <span data-feather="file"></span>
                      My profile
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="'.$settings['siteurl'].'/admin/dashboard&role=writer&currentSection=myblogs">
                      <span data-feather="file"></span>
                      My Blogs
                    </a>
                  </li>';
        }
        ?>
    </ul>
  </div>
</nav>