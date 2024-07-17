<div class="content-wrapper">
    <div class="flashData" data-flashdata="<?php echo $this->session->flashdata('pesanSukses'); ?>"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('plating/permintaan') ?>">Permintaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
            </ol>
        </nav>
        <?php if (empty($this->cart->contents())) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="alert-icon">
                    <i class="icon-info"></i>
                </div>
                <div class="alert-message">
                    <span><strong>Maaf</strong> Belum ada permintaan</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <a href="<?= base_url('plating/permintaan') ?>" class="btn btn-light px-5">Belanja Sekarang</a>
                    </center>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Keranjang Permintaan</div>

                            <?php echo form_open('path/to/controller/update/method'); ?>
                            <div class="row">

                                <div class="col-lg-12">

                                    <table class="table" cellpadding="6" cellspacing="1" border="0">

                                        <tr>
                                            <th>QTY</th>
                                            <th>Nama Barang</th>
                                            <th class="text-center">Action</th>
                                        </tr>

                                        <?php $i = 1; ?>

                                        <?php foreach ($this->cart->contents() as $items): ?>

                                            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                                            <tr>
                                                <td>
                                                    <?php echo form_input(array('name' => $i . '[qty]', 'class' => 'form-control', 'type' => 'number', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '0', 'size' => '3')); ?>
                                                </td>
                                                <td>
                                                    <?php echo $items['name']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('plating/permintaan/hapusKeranjang/' . $items['rowid']) ?>"
                                                        class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>

                                        <?php endforeach; ?>
                                </div>
                            </div>
                            </table>
                            <hr>
                            <center>
                                <div class="row mb-3 mt-2">
                                    <div class="col align-self-end">
                                        <a href="<?php echo base_url('plating/permintaan') ?>"
                                            class="btn btn-danger">Lanjutkan
                                            Belanja</a>
                                        <a href="<?php echo base_url('plating/permintaan/transaksiPermintaan') ?>"
                                            class="btn btn-light">Ajukan Permintaan</a>
                                    </div>
                                </div>
                            </center>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>