function previewImage() {
  const gambar = document.querySelector(".gambar");
  const imgPreview = document.querySelector(".img-preview");

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}

$(document).ready(function () {
  const tombolCari = $(".tombol-cari");
  const keyword = $(".keyword");
  const container = $(".admin-container");

  tombolCari.hide();

  keyword.keyup(function () {
    var keywords = keyword.val().split(" "); // Mengelompokkan kata kunci menjadi array
    $.ajax({
      url: "../ajax/ajax_cari.php",
      data: {
        keywords: keywords, // Menggunakan array kata kunci
      },
      type: "get",
      success: function (response) {
        container.html(response);
      },
    });
  });
});
