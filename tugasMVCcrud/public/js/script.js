$(function () {
  $(".tombolTambahData").on("click", function () {
    $("#formModalLabel").html("Tambah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#nama").val("");
    $("#nim").val("");
    $("#jurusan").val("");
    $("#email").val("");
    $(".modal-body form").attr(
      "action",
      BASEURL + "/index.php?url=mahasiswa/tambah"
    );
  });
  $(".tampilModalUbah").on("click", function () {
    $("#formModalLabel").html("Ubah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      BASEURL + "/index.php?url=mahasiswa/ubah"
    );

    const id = $(this).data("id");

    // karena objek pake {}
    $.ajax({
      url: BASEURL + "/index.php?url=mahasiswa/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#nrp").val(data.nrp);
        $("#jurusan").val(data.jurusan);
        $("#email").val(data.email);
        $("#id").val(data.id);
      },
    });
  });
});
