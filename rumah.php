<?php

class Rumah {

  public $warna = "Putih";
  public $jumlahKamar = 4;
  public $alamat = "Jl. Merpati No. 10";

  public function kunciPintu() {
    return "Pintu Terkunci";
  }

  public function gantiWarna($warnaBaru) {
    $this->warna = $warnaBaru;
    return "warna rumah berhasil diubah menjadi " . $this->warna;
  }

}

$rumahSaya = new Rumah();
$rumahTetangga = new Rumah();