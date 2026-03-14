<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perhitungan Diskon - Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .summary-card {
        border-left: 5px solid #0d6efd;
    }

    .total-row {
        font-size: 1.1rem;
        font-weight: bold;
        background-color: #e8f4ff;
    }

    .hemat-row {
        background-color: #d1f5d3;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1 class="mb-1">🛒 Sistem Perhitungan Diskon Bertingkat Pembelian Buku</h1>
        <p class="text-muted mb-4">Perhitungan diskon pembelian buku</p>

        <?php

    //DATA INPUT PEMBELI & BUKU
    $nama_pembeli = "Adi Farich";
    $judul_buku   = "Laravel Framework untuk Pemula";
    $harga_satuan = 190000;
    $jumlah_beli  = 5;
    $is_member    = true; // true = member, false = non-member

    //HITUNG SUBTOTAL
    $subtotal = $harga_satuan * $jumlah_beli;

    //TENTUKAN PERSENTASE DISKON BERDASARKAN JUMLAH BUKU
    if ($jumlah_beli >= 1 && $jumlah_beli <= 2) {
        $persentase_diskon = 0;
        $keterangan_diskon = "Tidak ada diskon (beli 1-2 buku)";
    } elseif ($jumlah_beli >= 3 && $jumlah_beli <= 5) {
        $persentase_diskon = 10;
        $keterangan_diskon = "Diskon 10% (beli 3-5 buku)";
    } elseif ($jumlah_beli >= 6 && $jumlah_beli <= 10) {
        $persentase_diskon = 15;
        $keterangan_diskon = "Diskon 15% (beli 6-10 buku)";
    } else {
        $persentase_diskon = 20;
        $keterangan_diskon = "Diskon 20% (beli > 10 buku)";
    }

    //HITUNG DISKON UTAMA
    $diskon = $subtotal * ($persentase_diskon / 100);

    //TOTAL SETELAH DISKON PERTAMA
    $total_setelah_diskon1 = $subtotal - $diskon;

    //HITUNG DISKON MEMBER (tambahan 5% jika member)
    $persentase_member = 0;
    $diskon_member     = 0;
    if ($is_member) {
        $persentase_member = 5;
        $diskon_member     = $total_setelah_diskon1 * ($persentase_member / 100);
    }

    //TOTAL SETELAH SEMUA DISKON
    $total_setelah_diskon = $total_setelah_diskon1 - $diskon_member;

    //HITUNG PPN 11%
    $ppn = $total_setelah_diskon * 0.11;

    //TOTAL AKHIR
    $total_akhir = $total_setelah_diskon + $ppn;

    //TOTAL PENGHEMATAN (diskon utama + diskon member)
    $total_hemat = $diskon + $diskon_member;

    //HELPER: Format Rupiah
    function rupiah($angka) {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
    ?>

        <div class="row g-4">

            <!-- CARD: Info Pembeli & Buku -->
            <div class="col-md-5">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"> Data Pembelian</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-sm mb-0">
                            <tr>
                                <th>Nama Pembeli</th>
                                <td>: <?php echo $nama_pembeli; ?></td>
                            </tr>
                            <tr>
                                <th>Judul Buku</th>
                                <td>: <?php echo $judul_buku; ?></td>
                            </tr>
                            <tr>
                                <th>Harga Satuan</th>
                                <td>: <?php echo rupiah($harga_satuan); ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Beli</th>
                                <td>: <?php echo $jumlah_beli; ?> buku</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:
                                    <?php if ($is_member): ?>
                                    <span class="badge bg-success"> Member</span>
                                    <?php else: ?>
                                    <span class="badge bg-secondary">Non-Member</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- CARD: Aturan Diskon -->
            <div class="col-md-7">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"> Aturan Diskon</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Jumlah Buku</th>
                                    <th>Diskon</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="<?php echo ($jumlah_beli <= 2) ? 'table-primary fw-bold' : ''; ?>">
                                    <td>1 - 2 buku</td>
                                    <td>0%</td>
                                    <td><?php echo ($jumlah_beli <= 2) ? '✅ Berlaku' : '-'; ?></td>
                                </tr>
                                <tr
                                    class="<?php echo ($jumlah_beli >= 3 && $jumlah_beli <= 5) ? 'table-primary fw-bold' : ''; ?>">
                                    <td>3 - 5 buku</td>
                                    <td>10%</td>
                                    <td><?php echo ($jumlah_beli >= 3 && $jumlah_beli <= 5) ? '✅ Berlaku' : '-'; ?></td>
                                </tr>
                                <tr
                                    class="<?php echo ($jumlah_beli >= 6 && $jumlah_beli <= 10) ? 'table-primary fw-bold' : ''; ?>">
                                    <td>6 - 10 buku</td>
                                    <td>15%</td>
                                    <td><?php echo ($jumlah_beli >= 6 && $jumlah_beli <= 10) ? '✅ Berlaku' : '-'; ?>
                                    </td>
                                </tr>
                                <tr class="<?php echo ($jumlah_beli > 10) ? 'table-primary fw-bold' : ''; ?>">
                                    <td>&gt; 10 buku</td>
                                    <td>20%</td>
                                    <td><?php echo ($jumlah_beli > 10) ? '✅ Berlaku' : '-'; ?></td>
                                </tr>
                                <tr class="<?php echo $is_member ? 'table-success fw-bold' : ''; ?>">
                                    <td colspan="2">Bonus Member</td>
                                    <td><?php echo $is_member ? '✅ +5%' : '-'; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-muted small mb-0">
                             <strong>Diskon yang berlaku:</strong> <?php echo $keterangan_diskon; ?>
                            <?php if ($is_member): ?>
                            + Bonus Member 5%
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- CARD: Rincian Perhitungan -->
            <div class="col-12">
                <div class="card shadow-sm summary-card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0"> Rincian Perhitungan</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm mb-0">
                            <tbody>
                                <tr>
                                    <td width="60%">Subtotal
                                        <small class="text-muted">(<?php echo rupiah($harga_satuan); ?> ×
                                            <?php echo $jumlah_beli; ?> buku)</small>
                                    </td>
                                    <td class="text-end"><?php echo rupiah($subtotal); ?></td>
                                </tr>

                                <?php if ($persentase_diskon > 0): ?>
                                <tr class="text-danger">
                                    <td>Diskon <?php echo $persentase_diskon; ?>%
                                        <span class="badge bg-danger ms-1"><?php echo $keterangan_diskon; ?></span>
                                    </td>
                                    <td class="text-end">- <?php echo rupiah($diskon); ?></td>
                                </tr>
                                <?php else: ?>
                                <tr class="text-muted">
                                    <td>Diskon <span class="badge bg-secondary">Tidak ada diskon</span></td>
                                    <td class="text-end">Rp 0</td>
                                </tr>
                                <?php endif; ?>

                                <tr class="table-light">
                                    <td>Total setelah diskon utama</td>
                                    <td class="text-end"><?php echo rupiah($total_setelah_diskon1); ?></td>
                                </tr>

                                <?php if ($is_member): ?>
                                <tr class="text-success">
                                    <td>Diskon Member 5%
                                        <span class="badge bg-success ms-1"> Member Bonus</span>
                                        <small class="text-muted">(dari
                                            <?php echo rupiah($total_setelah_diskon1); ?>)</small>
                                    </td>
                                    <td class="text-end">- <?php echo rupiah($diskon_member); ?></td>
                                </tr>
                                <?php endif; ?>

                                <tr class="table-light">
                                    <td>Total setelah semua diskon</td>
                                    <td class="text-end"><?php echo rupiah($total_setelah_diskon); ?></td>
                                </tr>

                                <tr class="text-warning-emphasis">
                                    <td>PPN 11%</td>
                                    <td class="text-end">+ <?php echo rupiah($ppn); ?></td>
                                </tr>

                                <tr class="total-row">
                                    <td> <strong>TOTAL AKHIR</strong></td>
                                    <td class="text-end text-primary"><?php echo rupiah($total_akhir); ?></td>
                                </tr>

                                <tr class="hemat-row">
                                    <td> <strong>Total Penghematan</strong></td>
                                    <td class="text-end text-success"><?php echo rupiah($total_hemat); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>