<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/pengguna') ?>">Profil</a></li>
            </ol>
        </nav>
        <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="card profile-card-2">
                    <div class="card-img-block">
                        <img class="img-fluid" src="<?= base_url('assets/images/gallery/ipp.png') ?>"
                            alt="Card image cap">
                    </div>
                    <div class="card-body pt-5">
                        <img src="<?= base_url('assets/images/foto/') . $this->session->userdata('foto') ?> "
                            alt="profile-image" class="profile" style="width: 80px; height:80px;">
                        <h5 class="card-title">
                            <?= $this->session->userdata('nama_user') ?>
                        </h5>
                        <hr>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#profile" data-toggle="pill"
                                    class="nav-link active"><i class="icon-user"></i> <span
                                        class="hidden-xs">Profil</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active" id="profile">
                                <h5 class="mb-3">Detail Pengguna</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Nama</h6>
                                        <p>
                                            <?= $this->session->userdata('nama_user') ?>
                                        </p>
                                        <h6>NIP</h6>
                                        <p>
                                            <?= $this->session->userdata('nip') ?>
                                        </p>
                                        <h6>Tanggal Lahir</h6>
                                        <p>
                                            <?= $this->session->userdata('tgl_lahir') ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Jabatan</h6>
                                        <p>
                                            <?= $this->session->userdata('nama_jabatan') ?>
                                        </p>
                                        <h6>Divisi</h6>
                                        <p>
                                            <?= $this->session->userdata('nama_divisi') ?>
                                        </p>
                                        <hr>
                                        <span class="badge badge-success"><i class="fa fa-check-circle"></i>
                                            Aktif</span>
                                    </div>
                                    <div class="col-md-12">
                                        <a class="btn btn-secondary"
                                            href="<?= base_url('ppic/profil/ubahPassword/') ?> ">Ubah
                                            Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->