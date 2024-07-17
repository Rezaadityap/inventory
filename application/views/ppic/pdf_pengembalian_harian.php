<!DOCTYPE html>
<html>

<head>
    <style>
    #laporan {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #laporan td,
    #laporan th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #laporan tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #laporan tr:hover {
        background-color: #ddd;
    }

    #laporan th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>

<body>
    <h2 style="display: inline-block; text-align: center">PT.
        INDOPLAT PERKASA PURNAMA</h2>
    <p style="text-align: center">Jl. Dalem Wirabangsa No. 25, Gintungkerta, Klari, Karawang.</p>
    <h6>Tanggal :
        <?= $tanggal ?> /
        <?= $bulan ?> /
        <?= $tahun ?>
    </h6>
    <table id="laporan">
        <tr>
            <th>Kode Kimia</th>
            <th>Nama Kimia</th>
            <th>Satuan</th>
            <th>Supplier</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
        </tr>
        <?php foreach ($laporan as $l): ?>
        <tr>
            <td><?= $l->kd_kimia ?></td>
            <td><?= $l->nm_kimia ?></td>
            <td><?= $l->satuan ?></td>
            <td><?= $l->nm_supplier ?></td>
            <td><?= $l->tanggal_kembali ?></td>
            <td><?= $l->jumlah ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>