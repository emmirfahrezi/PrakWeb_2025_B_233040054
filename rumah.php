<?php

class Rumah {

  public $warna;
  public $alamat;

  public function __construct($warna = "putih", $alamat = "Jalan Merdeka No.1") {
      $this->warna = $warna;
      $this->alamat = $alamat;
  }
}

  function pasangListrik(Rumah $dataRumah) {
      return "Listrik sudah terpasang di rumah " . $dataRumah->warna . " yang beralamat di " . $dataRumah->alamat;
  } 

$rumahSaya = new Rumah("biru","Jalan Sudirman No.10");
echo pasangListrik($rumahSaya);
echo "<br>";

$teksbiasa = "ini cuman string biasa";
