<?php
    include "../inc/inc_koneksi.php";
    global $Koneksi; // Tambahkan ini untuk memastikan variabelnya tembus ke bawah
    $no = 1;
    // ... kode query kamu
?>
<?php
    include "../inc/inc_header.php";
?>
<h1>halaman ADMIN</h1>
<div class="mb-3 row">
    <div class="col-md-6">
        <form method="post" action="proses_input.php">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="kutip">Kutipan</label>
                <textarea class="form-control" id="kutip" name="kutip" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?php
include "../inc/inc_footer.php";
