<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan</title>
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row mt-4 mb-4" style="justify-content: center;">
            <img src="<?= base_url('assets/images/logo.png') ?>" style="height: 85px;" alt="">
            <h2 class="text-center mb-4 mt-4" style="display: inline-block;">PT. INDOPLAT PERKASA PURNAMA</h2>
        </div>
        <h6>Tahun :
            <?= $tahun ?>
        </h6>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Kode Kimia</th>
                <th>Nama Kimia</th>
                <th>Satuan</th>
                <th>Supplier</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
            </tr>
            <?php $no = 1;
            foreach ($laporan as $l): ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <?= $l->kd_kimia ?>
                    </td>
                    <td>
                        <?= $l->nm_kimia ?>
                    </td>
                    <td>
                        <?= $l->satuan ?>
                    </td>
                    <td>
                        <?= $l->nm_supplier ?>
                    </td>
                    <td>
                        <?= $l->tanggal_kembali ?>
                    </td>
                    <td>
                        <?= $l->jumlah ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
</body>
<script>
    window.print();
</script>

</html>