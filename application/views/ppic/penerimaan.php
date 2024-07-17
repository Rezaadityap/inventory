<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Penerimaan</li>
            </ol>
        </nav>
        <?php if (empty($penerimaan)) { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong>Maaf</strong> Belum ada penerimaan!</span>
            </div>
        </div> <?php } else { ?>
        <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div class="alert-icon">
                <i class="icon-info"></i>
            </div>
            <div class="alert-message">
                <span><strong>Penerimaan hari ini:</strong> <?php echo format_indo(date('Y-m-d')); ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Penerimaan</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama Kimia</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Status</th>
                                        <th class="text-center" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                        foreach ($penerimaan as $p): ?>
                                    <?php
                                            echo form_open('ppic/penerimaan/kembalikan');
                                            echo form_hidden('id', $p->id_kimia);
                                            echo form_hidden('price', $p->stok);
                                            echo form_hidden('name', $p->nm_kimia);
                                            echo form_hidden('qty', $p->jumlah);
                                            ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $no++ ?>
                                        </th>
                                        <td>
                                            <?= $p->kd_kimia ?>
                                        </td>
                                        <td>
                                            <?= $p->nm_kimia ?>
                                        </td>
                                        <td>
                                            <?= format_indo($p->tgl_masuk) ?>
                                        </td>
                                        <td>
                                            <?= $p->jumlah ?>
                                        </td>
                                        <?php if ($p->status == 0) { ?>
                                        <td>
                                            <span class="badge badge-success"><i class="fa fa-check-circle"></i>
                                                OK</span>
                                        </td>
                                        <?php } elseif ($p->status == 1) { ?>
                                        <td>
                                            <span class="badge badge-warning"><i class="fa fa-clock-o"></i>
                                                Check</span>
                                        </td>
                                        <?php } else { ?>
                                        <td>
                                            <span class="badge badge-danger"><i class="fa fa-exclamation-circle"></i>
                                                NG</span>
                                        </td>
                                        <?php } ?>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-warning"
                                                href="<?= base_url('ppic/penerimaan/lihat/') . $p->id_stok ?>"><i
                                                    class="fa fa-eye"></i></a>
                                            <?php if($p->status == 2) { ?>
                                            <button class="btn btn-sm btn-danger" type="submit"><i
                                                    class="fa fa-share"></i></button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?= form_close(); ?>
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