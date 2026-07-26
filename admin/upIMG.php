
<?php
    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
    if (! $_FILES['file']['error']) {
        // 1. Ambil ekstensi file dengan cara yang aman
        $ext      = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $filename = md5(rand(100, 999)) . '_' . time() . '.' . $ext;

        // 2. Simpan file ke folder IMG (naik 1 level dari folder admin)
        $destination = '../IMG/' . $filename;
        $location    = $_FILES["file"]["tmp_name"];

        if (move_uploaded_file($location, $destination)) {
            // 3. PENTING: Kembalikan URL yang benar agar bisa dibaca browser dari folder admin
            echo '../IMG/' . $filename;
        } else {
            http_response_code(500);
            echo "Gagal memindahkan file ke folder IMG";
        }
    } else {
        echo 'Ooops! Your upload triggered the following error: ' . $_FILES['file']['error'];
    }
}
?>