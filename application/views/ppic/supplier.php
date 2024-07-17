<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Supplier</li>
            </ol>
        </nav>
        <a href="<?= base_url('ppic/supplier/tambah') ?>" class="btn btn-success mb-3">Tambah Supplier</a>
        <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Supplier</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Telepon</th>
                                        <th class="text-center" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($supplier as $s): ?>
                                    <tr>
                                        <th scope="row">
                                            <?= ++$start ?>
                                        </th>
                                        <td>
                                            <?= $s['kd_supplier'] ?>
                                        </td>
                                        <td>
                                            <?= $s['nm_supplier'] ?>
                                        </td>
                                        <td>
                                            <?= $s['alamat'] ?>
                                        </td>
                                        <td>
                                            <?= $s['no_telp'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info"
                                                href="<?= base_url('ppic/supplier/edit/') . $s['id_supplier'] ?>"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger tombol-hapus"
                                                href="<?= base_url('ppic/supplier/hapus/') . $s['id_supplier'] ?>"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->