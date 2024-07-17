<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
            </ol>
        </nav>
        <?php if (empty($pengembalian)) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="alert-icon">
                    <i class="icon-info"></i>
                </div>
                <div class="alert-message">
                    <span><strong>Maaf</strong> Belum ada pengembalian!</span>
                </div>
            </div> <?php } else { ?>
            <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Pengembalian</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Status</th>
                                            <th class="text-center" scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pengembalian as $p): ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= $no++ ?>
                                                </th>
                                                <td>
                                                    <?= $p->nama_user ?>
                                                </td>
                                                <td>
                                                    <?= $p->nama_jabatan ?>
                                                </td>
                                                <td>
                                                    <?= format_indo($p->tanggal_kembali) ?>
                                                </td>
                                                <?php if ($p->status == 0) { ?>
                                                    <td>
                                                        <span class="badge badge-warning"><i class="fa fa-exclamation-circle"></i>
                                                            Menunggu</span>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <span class="badge badge-success"><i class="fa fa-check-circle"></i>
                                                            Dikirim</span>
                                                    </td>
                                                <?php } ?>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-info"
                                                        href="<?= base_url('ppic/pengembalian/detail/') . $p->id_pengembalian ?>"><i
                                                            class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->