<?php
    include "../inc/inc_koneksi.php";
    global $Koneksi; // Tambahkan ini untuk memastikan variabelnya tembus ke bawah
    $no = 1;
    // ... kode query kamu
?>
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
    $judul   = $_POST['judul'];
    $isi     = $_POST['isi'];
    $kutipan = $_POST['kutipan'];

    if ($judul == '' or $isi == '') {
        $error = "Silakan masukkan semua data yakni adalah data isi dan judul.";
    }

    if (empty($error)) {
        $sql1 = "insert into halaman(judul, kutipan, isi) values ('$judul', '$kutipan', '$isi')";
        $q1   = pg_query($koneksi, $sql1); // PAKAI pg_query, BUKAN mysqli_query!

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
    <div class="col-md-6">
        <form method="post" action="proses_input.php">
            <div class="form-group">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" value="<?php echo $judul; ?>" name="judul">
                </div>
            </div>
            <div class="form-group">
                <label for="kutip" class="col-sm-2 col-form-label">Kutipan</label>
                <div class="col-sm-10">
                    <input class="form-control" id="kutip" name="kutip" value="<?php echo $kutip; ?>"></input>
                </div>
            </div>
            <div class="form-group">
                <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="isi" name="isi"><?php echo $isi; ?></textarea>
                </div>
            </div>
            <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?php
include "../inc/inc_footer.php";
