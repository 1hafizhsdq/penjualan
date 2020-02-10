<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CB-PERPUS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php
    $role_id = $this->session->userdata('role_id');
    $querymenu = "SELECT user_menu.id, user_menu.menu FROM user_menu JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id
    WHERE user_access_menu.role_id = $role_id ORDER BY user_access_menu.menu_id ASC ";
    $menu = $this->db->query($querymenu)->result_array();
    ?>
    <!-- Heading -->

    <!-- LOAPING  -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>
        <?php
        $menuid = $m['id'];
        $qsubmenu = " SELECT * 
        FROM user_sub_menu 
        WHERE menu_id = $menuid
        AND is_active = 1";
        $submenu = $this->db->query($qsubmenu)->result_array();
        ?>

        <?php foreach ($submenu as $sm) : ?>
            <?php
            if ($title == $sm['title']) :
            ?>
                <li class="nav-item active">
                <?php
            else :  ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php
        endforeach;
            ?>
            <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->