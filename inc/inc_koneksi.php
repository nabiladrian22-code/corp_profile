<?php
    $host = "localhost";
    $port = "5432";
    $user = "postgres";
    $pass = "123";
    $db   = "testPostgreSQL";

    // Membuat string koneksi
    $connection_string = "host={$host} port={$port} dbname={$db} user={$user} password={$pass}";

    // Menghubungkan ke PostgreSQL
    $Koneksi = pg_connect($connection_string);

    if (! $Koneksi) {
    die("Koneksi Gagal: " . pg_last_error());
    }
?>

<?php
    //D:\php\php.exe -S localhost:8000 -t d:\code\PHP
    #untuk menyuruh PHP (-S) membuat server di alamat localhost dengan port 8000, dan target foldernya (-t) diarahkan ke folder codingan kamu di d:\code\PHP.

    //http://localhost:8000/inc/inc_koneksi.php
    #contoh untuk mengakses file inc_koneksi.php melalui browser, dengan asumsi server PHP sudah dijalankan di localhost pada port 8000 dan folder target adalah d:\code\PHP.

$aktif = "true";
?>