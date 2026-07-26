<?php
    include "../inc/inc_header.php";
?>
<?php
    $judul  = "";
    $kutip  = "";
    $isi    = "";
    $error  = "";
    $sukses = "";

    if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $isi   = $_POST['isi'];
    $kutip = $_POST['kutip'];

    if ($judul == '' or $isi == '') {
        $error = "Silakan masukkan semua data yakni adalah data isi dan judul.";
    }

    if (empty($error)) {
        $sql1 = "insert into pages(title, kutip, isi) values ('$judul', '$kutip', '$isi')";
        $q1   = pg_query($Koneksi, $sql1); // PAKAI pg_query, BUKAN mysqli_query!

        if ($q1) {
            $sukses = "Sukses memasukkan data";
        } else {
            $error = "Gagal memasukkan data";
        }
    }
    }
?>

<h1>halaman ADMIN</h1>
<div class="mb-3 row">
    <div class="col-md-12">

    <?php if ($sukses) {?>
        <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
        </div>
    <?php }?>

    <?php if ($error) {?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
    <?php }?>

        <form method="post">

            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>"></input>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="kutip" class="col-sm-2 col-form-label">Kutipan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="kutip" name="kutip" value="<?php echo $kutip; ?>"></input>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="summernote" class="col-sm-2 col-form-label">Isi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="summernote" name="isi"><?php echo $isi; ?></textarea>
                </div>
            </div>

            <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Simpan</button>
            <button type="reset" id="btn-clear" class="btn btn-secondary">Clear</button>
        </form>
    </div>
</div>

<?php
include "../inc/inc_footer.php";
