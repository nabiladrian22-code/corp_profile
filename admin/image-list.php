
<?php
    // Buka folder IMG (naik 1 level dari folder admin)
    $directory = "../IMG/";
    $result    = [];

    if (is_dir($directory)) {
    $files = scandir($directory);
    foreach ($files as $file) {
        // Ambil hanya file gambar (.jpg, .jpeg, .png, .gif, .webp)
        if (preg_match('/^.*\.(jpg|jpeg|png|gif|webp)$/i', $file)) {
            $result[] = $file;
        }
    }
    }

    // Kirimkan data ke Summernote dalam bentuk JSON
    header('Content-Type: application/json');
echo json_encode($result);
?>