<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Tahunan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Laporan Penjualan Tahunan</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= site_url('laporan/get_data'); ?>">
                <div class="form-group row">
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="tahun" value="<?= isset($tahun) ? $tahun : date('Y') ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                    <a href="<?= site_url('laporan/download_database'); ?>" class="btn btn-success ml-2">Download Database</a>
                </div>
            </form>

            <?php if(isset($laporan)) : ?>
                <hr>
                <h5>Periode Pada <?= $tahun; ?></h5>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th rowspan="2">Menu</th>
                            <th colspan="12" class="text-center">Periode Pada <?= $tahun; ?></th>
                            <th rowspan="2">Total</th>
                        </tr>
                        <tr>
                            <th>Jan</th>
                            <th>Feb</th><th>Mar</th><th>Apr</th><th>Mei</th><th>Jun</th>
                            <th>Jul</th><th>Ags</th><th>Sep</th><th>Okt</th><th>Nov</th><th>Des</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $kategori_sebelumnya = ''; 
                        foreach ($laporan as $item): 
                            if($item->kategori != $kategori_sebelumnya): ?>
                                <tr class="table-secondary">
                                    <td colspan="14"><strong><?= ucfirst($item->kategori); ?></strong></td>
                                </tr> 
                            <?php 
                            $kategori_sebelumnya = $item->kategori;
                            endif;
                            ?>

                            <tr>
                                <td><?= $item->nama ?></td>
                                <td><?= number_format($item->Jan, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Feb, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Mar, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Apr, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Mei, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Jun, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Jul, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Ags, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Sep, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Okt, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Nov, 0, ',', '.') ?></td>
                                <td><?= number_format($item->Des, 0, ',', '.') ?></td>
                                <td><strong><?= number_format($item->Total, 0, ',', '.') ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                        <td> Grand Total </td>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
