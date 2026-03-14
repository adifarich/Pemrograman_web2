<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Buku - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1 class="mb-2"> Informasi Buku</h1>
        <p class="text-muted mb-4">Koleksi buku perpustakaan</p>

        <?php
        
        //Buku 1
        $judul1        = "Pemrograman Web dengan PHP";
        $pengarang1    = "Slamet Hidayat";
        $penerbit1     = "Media Terbit 1";
        $tahun_terbit1 = 2020;
        $harga1        = 85000;
        $stok1         = 20;
        $isbn1         = "978-602-1234-56-7";
        $kategori1     = "Programming";
        $bahasa1       = "Indonesia";
        $halaman1      = 300;
        $berat1        = 450;

        //Buku 2
        $judul2        = "MySQL Database Administration";
        $pengarang2    = "Widodo";
        $penerbit2     = "Media Terbit 2";
        $tahun_terbit2 = 2022;
        $harga2        = 100000;
        $stok2         = 10;
        $isbn2         = "978-602-0055-12-3";
        $kategori2     = "Database";
        $bahasa2       = "Indonesia";
        $halaman2      = 375;
        $berat2        = 550;

        //BUKU 3
        $judul3        = "Web Design with CSS";
        $pengarang3    = "Utami Sariwangi";
        $penerbit3     = "Media Terbit 3";
        $tahun_terbit3 = 2021;
        $harga3        = 165000;
        $stok3         = 15;
        $isbn3         = "978-149-1935-18-6";
        $kategori3     = "Web Design";
        $bahasa3       = "Inggris";
        $halaman3      = 500;
        $berat3        = 800;

        //BUKU 4
        $judul4        = "Laravel Framework untuk Pemula";
        $pengarang4    = "Anggun Febriyani";
        $penerbit4     = "Media Terrbit 2";
        $tahun_terbit4 = 2023;
        $harga4        = 190000;
        $stok4         = 25;
        $isbn4         = "978-979-2963-45-8";
        $kategori4     = "Programming";
        $bahasa4       = "Indonesia";
        $halaman4      = 440;
        $berat4        = 650;

        //FUNGSI BADGE KATEGORI
        function badgeKategori($kategori) {
            switch ($kategori) {
                case 'Programming':
                    return '<span class="badge bg-primary"> Programming</span>';
                case 'Database':
                    return '<span class="badge bg-success"> Database</span>';
                case 'Web Design':
                    return '<span class="badge bg-warning text-dark"> Web Design</span>';
                default:
                    return '<span class="badge bg-secondary">' . $kategori . '</span>';
            }
        }
       
        //FUNGSI WARNA HEADER CARD
        function headerKategori($kategori) {
            switch ($kategori) {
                case 'Programming': return 'bg-primary';
                case 'Database':    return 'bg-success';
                case 'Web Design':  return 'bg-warning';
                default:            return 'bg-secondary';
            }
        }

        //ARRAY SEMUA BUKU
        $buku = [
            [
                'judul'        => $judul1,
                'pengarang'    => $pengarang1,
                'penerbit'     => $penerbit1,
                'tahun_terbit' => $tahun_terbit1,
                'harga'        => $harga1,
                'stok'         => $stok1,
                'isbn'         => $isbn1,
                'kategori'     => $kategori1,
                'bahasa'       => $bahasa1,
                'halaman'      => $halaman1,
                'berat'        => $berat1,
            ],
            [
                'judul'        => $judul2,
                'pengarang'    => $pengarang2,
                'penerbit'     => $penerbit2,
                'tahun_terbit' => $tahun_terbit2,
                'harga'        => $harga2,
                'stok'         => $stok2,
                'isbn'         => $isbn2,
                'kategori'     => $kategori2,
                'bahasa'       => $bahasa2,
                'halaman'      => $halaman2,
                'berat'        => $berat2,
            ],
            [
                'judul'        => $judul3,
                'pengarang'    => $pengarang3,
                'penerbit'     => $penerbit3,
                'tahun_terbit' => $tahun_terbit3,
                'harga'        => $harga3,
                'stok'         => $stok3,
                'isbn'         => $isbn3,
                'kategori'     => $kategori3,
                'bahasa'       => $bahasa3,
                'halaman'      => $halaman3,
                'berat'        => $berat3,
            ],
            [
                'judul'        => $judul4,
                'pengarang'    => $pengarang4,
                'penerbit'     => $penerbit4,
                'tahun_terbit' => $tahun_terbit4,
                'harga'        => $harga4,
                'stok'         => $stok4,
                'isbn'         => $isbn4,
                'kategori'     => $kategori4,
                'bahasa'       => $bahasa4,
                'halaman'      => $halaman4,
                'berat'        => $berat4,
            ],
        ];
        ?>

        <div class="row g-4">
            <?php foreach ($buku as $index => $b): ?>
            <div class="col-md-6">
                <div class="card h-100">
                    <div
                        class="card-header <?php echo headerKategori($b['kategori']); ?> text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><?php echo $b['judul']; ?></h5>
                        <span class="badge bg-white text-dark">#<?php echo $index + 1; ?></span>
                    </div>
                    <div class="card-body">
                        <!-- Badge Kategori & Bahasa -->
                        <div class="mb-3">
                            <?php echo badgeKategori($b['kategori']); ?>
                            <span class="badge bg-info text-dark ms-1"> <?php echo $b['bahasa']; ?></span>
                        </div>

                        <table class="table table-borderless table-sm">
                            <tr>
                                <th width="160">Pengarang</th>
                                <td>: <?php echo $b['pengarang']; ?></td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>: <?php echo $b['penerbit']; ?></td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td>: <?php echo $b['tahun_terbit']; ?></td>
                            </tr>
                            <tr>
                                <th>ISBN</th>
                                <td>: <?php echo $b['isbn']; ?></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>: Rp <?php echo number_format($b['harga'], 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>: <?php echo $b['stok']; ?> buku</td>
                            </tr>
                            <tr>
                                <th>Jumlah Halaman</th>
                                <td>: <?php echo $b['halaman']; ?> halaman</td>
                            </tr>
                            <tr>
                                <th>Berat Buku</th>
                                <td>: <?php echo $b['berat']; ?> gram</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-muted small">
                        Kategori: <?php echo $b['kategori']; ?> &bull; Bahasa: <?php echo $b['bahasa']; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>