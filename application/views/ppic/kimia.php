<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Kimia</li>
            </ol>
        </nav>
        <?php if (empty($kimia)) { ?>
        <span class="badge badge-danger mb-3"><i class="fa fa-eye"></i> Data tidak ada!</span>
        <div class="row">
            <div class="col-md-6">
                <form action="<?= base_url('ppic/kimia') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Kimia ..." name="keyword"
                            autocomplete="off" autofocus>
                        <input class="btn btn-secondary" type="submit" name="submit"></input>
                    </div>
                </form>
            </div>
        </div>
        <?php } else { ?>
        <div class="row">
            <div class="col-md-6">
                <form action="<?= base_url('ppic/kimia') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Kimia ..." name="keyword"
                            autocomplete="off" autofocus>
                        <input class="btn btn-secondary" type="submit" name="submit"></input>
                    </div>
                </form>
            </div>
        </div>
        <a href="<?= base_url('ppic/kimia/tambah') ?>" class="btn btn-success mb-3">Tambah Kimia</a>
        <a href="<?= base_url('ppic/kimia/tambahStok') ?>" class="btn btn-secondary mb-3">Tambah Stok</a>
        <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kimia</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Stok</th>
                                        <th class="text-center" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kimia as $k): ?>
                                    <tr>
                                        <th scope="row">
                                            <?= ++$start ?>
                                        </th>
                                        <td>
                                            <?= $k['kd_kimia'] ?>
                                        </td>
                                        <td>
                                            <?= $k['nm_kimia'] ?>
                                        </td>
                                        <td>
                                            <?= $k['satuan'] ?>
                                        </td>
                                        <td>
                                            <?= $k['stok'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info"
                                                href="<?= base_url('ppic/kimia/edit/') . $k['id_kimia'] ?>"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger tombol-hapus"
                                                href="<?= base_url('ppic/kimia/hapus/') . $k['id_kimia'] ?>"><i
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
        <?php } ?>
        <!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->