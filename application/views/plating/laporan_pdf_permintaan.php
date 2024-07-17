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
    <h6>Laporan Permintaan :
        <?= format_indo(date($permintaan->tanggal_minta)) ?>
    </h6>
    <table id="laporan">
        <tr>
            <th>Nama Kimia</th>
            <th>Satuan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
        </tr>
        <?php foreach ($detail as $d): ?>
        <tr>
            <td><?= $d->nm_kimia ?></td>
            <td><?= $d->satuan ?></td>
            <td><?= $d->tanggal_minta ?></td>
            <td><?= $d->jumlah ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>Yang Meminta: <?php foreach ($detail as $dtl): ?> <?= $dtl->nama_user ?> <?php endforeach; ?><br>Yang mengetahui:
        <?= $permintaan->mengetahui?>
    </p>

</body>

</html>