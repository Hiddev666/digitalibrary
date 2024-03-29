<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="<?= BASEURL ?>/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container d-flex align-items-center justify-content-between pt-4 mt-3">
        <div class="d-flex align-items-center justify-content-between" style="width: 15%;">
            <a href="<?= BASEURL ?>/user/dipinjam" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
                <p>Peminjaman</p>
            </a>
            <a href="<?= BASEURL ?>/user/koleksi" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
                <p>Koleksi</p>
            </a>
        </div>
        <a href="<?= BASEURL ?>/user" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
            <img src="<?= BASEURL ?>/img/digitaLibrary.svg" alt="">
        </a>
        <div class="d-flex align-items-center justify-content-between">
            <div style="width: 40px; height: 40px; border-radius: 100%;" class="bg-warning d-flex justify-content-center align-items-center">
                <img src="<?= BASEURL?>/img/user.svg" alt="">
            </div>
            <div class="btn-group ms-3 d-flex align-items-center">
                <a type="button" class="dropdown-toggle link-offset-2 link-underline link-underline-opacity-0 text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION["username"]?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="<?= BASEURL ?>/auth/logout" class="dropdown-item" type="button">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container d-flex gap-2 mt-5">
        <form class="d-flex w-100" role="search" method="POST" action="<?= BASEURL ?>/user/search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
            <button class="btn btn-warning" type="submit">Search</button>
        </form>

        <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu mt-2 p-3" style="width: 100vh;">
                <h5>Filter</h5>
                <form action="" method="POST">
                    <div class="row mt-3">
                        <div class="col">
                            <select name="penulis" id="" class="form-select" name="penulis">
                                <option value="">Penulis</option>
                                <?php foreach ($datapenulis as $penulis) : ?>
                                    <option value="<?= $penulis["penulis"] ?>"><?= $penulis["penulis"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col">
                            <select name="penerbit" id="" class="form-select" name="penerbit">
                                <option value="">Penerbit</option>
                                <?php foreach ($datapenerbit as $penerbit) : ?>
                                    <option value="<?= $penerbit["penerbit"] ?>"><?= $penerbit["penerbit"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <select name="tahunterbit" id="" class="form-select" name="tahunterbit">
                                <option value="">Tahun Terbit</option>
                                <?php foreach ($datatahunterbit as $tahunterbit) : ?>
                                    <option value="<?= $tahunterbit["tahun_terbit"] ?>"><?= $tahunterbit["tahun_terbit"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col">
                            <select name="kategori" id="" class="form-select" name="kategori">
                                <option value="">Kategori</option>
                                <?php foreach ($datakategori as $kategori) : ?>
                                    <option value="<?= $kategori["nama_kategori"] ?>"><?= $kategori["nama_kategori"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col"></div>
                        <div class="col d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-warning" name="startfilter">Cari</button>
                        </div>
                    </div>
                </form>
            </ul>
        </div>
    </div>

    <?php include "components/$action.php" ?>

    <script src="<?= BASEURL ?>/js/bootstrap.bundle.min.js"></script>
</body>

</html>