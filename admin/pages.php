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
            $kata_kunci = (isset($_GET['cari'])) ? $_GET['cari'] : "";
            //ketika halaman membuka cari dan ada isi didaam "cari" maka nilainya akan dimasukan ke variabel $kata_kunci, jika tidak ada maka nilainya akan kosong.
        ?>
        <h1>halaman ADMIN</h1>
        <p>
            <a href="input.php" class="btn btn-primary" value="Input Data">Input Data</a>
        </p>
        <form class="row g-3" method="get">
            <div class="col-auto">
                <input type="text" class="form-control" name="cari" placeholder="Cari Data" value="<?php echo htmlspecialchars($kata_kunci, ENT_QUOTES); ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th>judul</th>
                    <th>kutipan</th>
                    <th class="col-1">aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi in possimus perspiciatis?</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, suscipit?</td>
                    <td>
                    <span class="badge bg-warning">Edit</span>
                    <span class="badge bg-danger">Hapus</span>
                    </td>
                </tr>
                <?php
                    $query  = "SELECT * FROM pages WHERE title LIKE '%$kata_kunci%' OR kutip LIKE '%$kata_kunci%'";
                    $result = pg_query($Koneksi, $query);
                    if ($result) {
                        while ($row = pg_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['kutip']) . "</td>";
                            echo "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> ";
                            echo "<a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
<?php
    include "../inc/inc_footer.php";
?>
</body>
</html>
