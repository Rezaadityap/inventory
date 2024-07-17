<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
            </ol>
        </nav>
        <a href="<?= base_url('ppic/pengguna/tambah') ?>" class="btn btn-success mb-3">Tambah Pengguna</a>
        <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pengguna</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nip</th>
                                        <th scope="col">Divisi</th>
                                        <th scope="col">Jabatan</th>
                                        <th class="text-center" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pengguna as $p): ?>
                                        <tr>
                                            <th scope="row">
                                                <?= ++$start ?>
                                            </th>
                                            <td>
                                                <?= $p['nama_user'] ?>
                                            </td>
                                            <td>
                                                <?= $p['nip'] ?>
                                            </td>
                                            <td>
                                                <?= $p['nama_divisi'] ?>
                                            </td>
                                            <td>
                                                <?= $p['nama_jabatan'] ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-warning"
                                                    href="<?= base_url('ppic/pengguna/detail/') . $p['id_user'] ?>"><i
                                                        class="fa fa-eye"></i></a>
                                                <a class="btn btn-sm btn-info"
                                                    href="<?= base_url('ppic/pengguna/edit/') . $p['id_user'] ?>"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger tombol-hapus"
                                                    href="<?= base_url('ppic/pengguna/hapus/') . $p['id_user'] ?>"><i
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