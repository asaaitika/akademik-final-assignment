 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
          <i class="far fa-building"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Akademik <br>Al-Aqsha</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nama menu -->

    <?php
      $role_id = $this->session->userdata('level_id');
      $query_menu = "SELECT user_menu.id_menu, user_menu.menu
                      From user_menu JOIN user_access_menu
                      ON user_menu.id_menu = user_access_menu.menu_id
                      WHERE user_access_menu.level_id = $role_id
                      ORDER BY user_access_menu.menu_id ASC
                    ";

      $menu = $this->db->query($query_menu)->result_array();
    ?>

    <!--LOOPING MENU -->
    <?php foreach ($menu as $m) :?>
      <div class="sidebar-heading">
        <?= $m['menu'];?>
      </div>

      <!-- SUB MENU-->
      <?php
        $menu_id = $m['id_menu'];
        $query_sub_menu = "SELECT *
                          From user_sub_menu 
                          WHERE menu_id = $menu_id AND is_active = 1
                        ";

        $sub_menu = $this->db->query($query_sub_menu)->result_array();
      ?>

      <?php foreach ($sub_menu as $s) : ?>
        <?php if ($title == $s['title']) : ?>
          <li class="nav-item active">
            <?php else : ?>
              <li class="nav-item">   
            <?php endif ;?>

          <a class="nav-link pb-0" href="<?= base_url($s['url']); ?>">
            <i class="<?= $s['icon']; ?>"></i>
            <span><?= $s['title']; ?></span></a>
      <?php endforeach; ?>
      <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout');?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
