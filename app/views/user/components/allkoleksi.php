<div class="container mt-5">
    <h1>Koleksi</h1>
</div>
<div class="container d-flex w-100 justify-content-center mb-5">
    <div class="row justify-content-center">
        <?php
        foreach ($databuku as $book) : ?>
            <div class="col mt-5">
                <div class='d-flex position-absolute z-3 ms-2 mt-2 flex-column gap-1'>
                    <?php
                    session_start();
                    $idUser = $_SESSION['user-id'];
                    $bukuId = $book['id'];

                    $checkPinjam = $peminjaman->checkPinjam($idUser, $bukuId);
                    $checkPending = $peminjaman->checkPending($idUser, $bukuId);

                    ?>

                    <?php if (count($checkPending) != 0) { ?>
                        <div class="badge text-bg-warning d-flex justify-content-between align-items-center"> <?= count($checkPending) ?> Buku Dipending <a href="<?= BASEURL ?>/user/cancelpending/<?= $bukuId ?>" class="btn btn-light btn-sm ms-2">Cancel</a></div>
                    <?php } ?>

                    <?php if (count($checkPinjam) != 0) { ?>
                        <div class="badge text-bg-success d-flex justify-content-between align-items-center p-2"> <?= count($checkPinjam) ?> Buku Dipinjam </div>
                    <?php } ?>
                </div>
                <a href="<?= BASEURL ?>/user/detailbuku/<?= $book['id'] ?>" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
                    <div class="card h-100" style="width: 16rem;">
                        <img src="<?= $book['image'] ?>" class="card-img-top object-fit-cover" alt="..." style="width: 100%; height: 300px;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="">
                                    <h5 class="card-title"><?= $book['judul'] ?></h5>
                                    <div class="d-flex gap-1 align-items-center">
                                        <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" alt="" style="width: 25px;">
                                        <p class="m-0">
                                            <?php
                                            $getRating = $bukumodel->getRating($book["id"]);
                                            if ($getRating['rate'] != NULL) {
                                                echo substr($getRating['rate'], 0, 3);
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="d-flex gap-1 align-items-center mt-1">
                                        <img src="<?= BASEURL ?>/img/book-closed-svgrepo-com.svg" alt="" style="width: 20px;">
                                        <p class="m-0">
                                            <?php
                                            $buku = new Buku_model();
                                            $getRating = $buku->getStock($book["id"]);
                                            if ($getRating['stock'] != NULL) {
                                                echo substr($getRating['stock'], 0, 3);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <a href="<?= BASEURL ?>/user/savekoleksi/<?= $book['id'] ?>">
                                    <img src="<?= BASEURL ?>/img/save<?php
                                                                        $checkSaved = $koleksi->getKoleksi($idUser, $bukuId);
                                                                        if (count($checkSaved) != 0) {
                                                                            echo "d";
                                                                        }
                                                                        ?>.svg" alt="" style="width: 18px;" class="">
                                </a>
                            </div>
                            <?php
                            if (count($checkPinjam) == 0) { ?>
                                <div class="d-flex flex-column gap-1 mt-4 justify-content-end">
                                    <a href="<?= BASEURL ?>/user/pinjam/<?= $book['id'] ?>" class="btn btn-warning w-100">Pinjam Sekarang</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>