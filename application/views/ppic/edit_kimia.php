<div class="content-wrapper">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('ppic/kimia') ?>">Kimia</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Kimia</li>
            </ol>
        </nav>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Form Edit Kimia</div>
                        <hr>
                        <form action="<?= base_url('ppic/kimia/editAksi') ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php foreach ($kimia as $k): ?>
                            <div class="form-group">
                                <label>Kode Kimia</label>
                                <input type="text" name="kd_kimia" value="<?= $k->kd_kimia ?>" class="form-control"
                                    readonly>
                                <input type="hidden" name="id_kimia" value="<?= $k->id_kimia ?>" id="">
                            </div>
                            <div class="form-group">
                                <label>Nama Kimia</label>
                                <input type="text" name="nm_kimia" class="form-control" value="<?= $k->nm_kimia ?>">
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <select name="satuan" id="" class="form-control">
                                    <option value="<?= $k->satuan ?>">
                                        <?= $k->satuan ?>
                                    </option>
                                    <?php if ($k->satuan == 'Jrg') { ?>
                                    <option value="Sak">Sak</option>
                                    <option value="Dus">Dus</option>
                                    <option value="Klg">Klg</option>
                                    <option value="Btl">Btl</option>
                                    <?php } ?>
                                    <?php if ($k->satuan == 'Sak') { ?>
                                    <option value="Jrg">Jrg</option>
                                    <option value="Dus">Dus</option>
                                    <option value="Klg">Klg</option>
                                    <option value="Btl">Btl</option>
                                    <?php } ?>
                                    <?php if ($k->satuan == 'Dus') { ?>
                                    <option value="Jrg">Jrg</option>
                                    <option value="Sak">Sak</option>
                                    <option value="Klg">Klg</option>
                                    <option value="Btl">Btl</option>
                                    <?php } ?>
                                    <?php if ($k->satuan == 'Klg') { ?>
                                    <option value="Jrg">Jrg</option>
                                    <option value="Sak">Sak</option>
                                    <option value="Dus">Dus</option>
                                    <option value="Btl">Btl</option>
                                    <?php } ?>
                                    <?php if ($k->satuan == 'Btl') { ?>
                                    <option value="Jrg">Jrg</option>
                                    <option value="Sak">Sak</option>
                                    <option value="Dus">Dus</option>
                                    <option value="Klg">Klg</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Supplier</label>
                                <select name="id_supplier" id="" class="form-control">
                                    <option value="<?php echo $k->id_supplier ?>">
                                        <?php echo $k->nm_supplier ?>
                                    </option>
                                    <?php foreach ($supplier as $s): ?>
                                    <option value="<?php echo $s->id_supplier ?>">
                                        <?php echo $s->nm_supplier ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_supplier', '<div class = "text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-light px-5">Simpan</button>
                            </div>
                            <?php endforeach; ?>
                        </form>
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