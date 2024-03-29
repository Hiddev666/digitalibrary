<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Tambah Buku</h3>
        <form method="POST" action="<?= BASEURL?>/admin/storebuku" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>
                <div class="col">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit">
                </div>
                <div class="col">
                    <label for="tahunterbit" class="form-label">Tahun Terbit</label>
                    <input type="text" class="form-control" id="tahunterbit" name="tahunterbit">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="penerbit" class="form-label">Kategori</label>
                    <select name="kategori" id="" class="form-select">
                        <?php
                        foreach ($categories as $category) { ?>
                            <option value="<?= $category['id'] ?>"><?= $category['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <label for="image" class="form-label">Cover</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                </div>
                <div class="col">
                    
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="storebuku">Tambah</button>
            </div>
        </form>
        <a href="index.php?bukuaction=read" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>