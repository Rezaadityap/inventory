<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="<?= base_url('plating/dashboard') ?>">
                    <img src="<?= base_url() ?>assets/images/logo.png" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Indoplat</h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">MENU NAVIGASI</li>
                <li>
                    <a href="<?= base_url('plating/dashboard') ?>">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('plating/permintaan') ?>">
                        <i class="zmdi zmdi-assignment-returned"></i> <span>Permintaan</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('plating/laporan') ?>">
                        <i class="zmdi zmdi-assignment"></i> <span>Laporan</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('plating/profil') ?>">
                        <i class="zmdi zmdi-face"></i> <span>Profil</span>
                    </a>
                </li>

                <li>
                    <a class="tombol-keluar" href="<?= base_url('auth/keluar') ?>" target="_blank">
                        <i class="icon-power"></i> <span>Keluar</span>
                    </a>
                </li>
            </ul>

        </div>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img
                                    src="<?= base_url('assets/images/foto/') . $this->session->userdata('foto') ?>"
                                    class="img-circle" alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3"
                                                src="<?= base_url('assets/images/foto/') . $this->session->userdata('foto') ?>"
                                                alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">
                                                <?= $this->session->userdata('nama_user') ?>
                                            </h6>
                                            <p class="user-subtitle">
                                                <?= $this->session->userdata('nip') ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><a href="<?= base_url('ppic/profil') ?>"><i
                                        class="zmdi zmdi-face mr-2"></i> Profil</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><a class="tombol-keluar" href="<?= base_url('auth/keluar') ?>"><i
                                        class="icon-power mr-2"></i> Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>