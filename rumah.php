<?php

class Rumah {

  public $warna;
  public $jumlahKamar;
  public $alamat;

  public function __construct($warna = "putih", $jumlahKamar = 3, $alamat = "Jalan Merdeka No.1") {
      $this->warna = $warna;
      $this->jumlahKamar = $jumlahKamar;
      $this->alamat = $alamat;
  }

  public function kunciPintu() {
      return "Pintu di alamat $this->alamat telah dikunci.";
  } 
}

$rumahSaya = new Rumah("biru", 4, "Jalan Sudirman No.10");
$rumahTetangga = new Rumah("kuning", 2, "Jalan Thamrin No.5");

echo "warna rumah saya: " . $rumahSaya->warna;
echo "<br>";
echo "jumlah kamar rumah saya: " . $rumahSaya->jumlahKamar;
echo "<br>";
echo "Alamat rumah saya: " . $rumahSaya->alamat;
echo "<br>";
echo $rumahSaya->kunciPintu();

