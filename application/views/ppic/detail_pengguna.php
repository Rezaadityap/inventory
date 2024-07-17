<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/pengguna') ?>">Pengguna</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pengguna</li>
            </ol>
        </nav>
        <?php foreach ($pengguna as $p): ?>
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="card profile-card-2">
                    <div class="card-img-block">
                        <img class="img-fluid" src="<?= base_url('assets/images/gallery/ipp.png') ?>"
                            alt="Card image cap">
                    </div>
                    <div class="card-body pt-5">
                        <img src="<?= base_url('assets/images/foto/') . $p->foto ?> " alt="profile-image"
                            class="profile" style="width: 80px; height:80px;">
                        <h5 class="card-title">
                            <?= $p->nama_user ?>
                        </h5>
                        <hr>
                        <p>
                            <?= $p->nip ?>
                        </p>
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
                                            <?= $p->nama_user ?>
                                        </p>
                                        <h6>NIP</h6>
                                        <p>
                                            <?= $p->nip ?>
                                        </p>
                                        <h6>Tanggal Lahir</h6>
                                        <p>
                                            <?= $p->tgl_lahir ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Jabatan</h6>
                                        <p>
                                            <?= $p->nama_jabatan ?>
                                        </p>
                                        <h6>Divisi</h6>
                                        <p>
                                            <?= $p->nama_divisi ?>
                                        </p>
                                        <hr>
                                        <span class="badge badge-success"><i class="fa fa-check-circle"></i>
                                            Aktif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->