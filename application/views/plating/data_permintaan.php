<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('plating/permintaan') ?>">Permintaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Permintaan</li>
            </ol>
        </nav>
        <?php if (empty($permintaan)) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="alert-icon">
                    <i class="icon-info"></i>
                </div>
                <div class="alert-message">
                    <span><strong>Maaf</strong> Belum ada permintaan</span>
                </div>
            </div>
            <center>
                <a href="<?= base_url('plating/permintaan') ?>" class="btn btn-danger">Kembali</a>
            </center>
        <?php } else { ?>
            <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Permintaan</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Status</th>
                                            <th class="text-center" scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($permintaan as $p): ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= $no++ ?>
                                                </th>
                                                <td>
                                                    <?= format_indo(date($p->tanggal_minta)) ?>
                                                </td>
                                                <?php if ($p->status == 0) { ?>
                                                    <td>
                                                        <span class="badge badge-danger"><i class="fa fa-exclamation-circle"></i>
                                                            Proses</span>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <span class="badge badge-primary"><i class="fa fa-rocket"></i>
                                                            Dikirim</span>
                                                    </td>
                                                <?php } ?>
                                                <?php if ($p->status == 1) { ?>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-info"
                                                            href="<?= base_url('plating/permintaan/dataDetail/') . $p->id_permintaan ?>"><i
                                                                class="fa fa-eye"></i></a>
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-info" disabled><i
                                                                class="fa fa-eye"></i></button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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