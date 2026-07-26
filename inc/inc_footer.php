</main>
    <footer class="bg-light">
        <div class="text-center p-3" style="padding: 10px; background-color: #31c7a6;">
            copyright &copy; 2024 - Dummy Company by Nabil Adrian Fadila S.Kom
        </div>

    </footer>
    <script>
        $(document).ready(function() {

        // FUNGSI SUPAYA TOMBOL CLEAR BISA BERSIHKAN SUMMERNOTE
        $('#btn-clear').on('click', function() {
        $('#summernote').summernote('code', ''); // Kosongkan Summernote
        });

        $('#summernote').summernote({
        callbacks: {
            onImageUpload: function(files) {
                for(let i=0; i < files.length; i++) {
                    $.upload(files[i]);
                }
            }
        },
    height: 300, // Atur tinggi editor sesuai kebutuhan

    toolbar: [
			["style", ["bold", "italic", "underline", "clear"]],
			["fontname", ["fontname"]],
			["fontsize", ["fontsize"]],
			["color", ["color"]],
			["para", ["ul", "ol", "paragraph"]],
			["height", ["height"]],
			["insert", ["link", "picture", "imageList", "video", "hr"]],
			["help", ["help"]]
		],
		dialogsInBody: true,
		imageList: {
			endpoint: "image-list.php",
			fullUrlPrefix: "../IMG/",
			thumbUrlPrefix: "../IMG/"
		}
  });

      $.upload = function (file) {
        let out = new FormData();
        out.append('file', file, file.name);

        $.ajax({
            method: 'POST',
            url: '../admin/upIMG.php',
            contentType: false,
            cache: false,
            processData: false,
            data: out,
            success: function (img) {
                $('#summernote').summernote('insertImage', img);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    };
    $('#btn-clear').on('click', function() {
    $('#summernote').summernote('code', '');
});
    </script>
</body>
</html>
