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

//bagian object

$rumahSaya = new Rumah();
echo "Warna awal rumah saya: " . $rumahSaya->warna;
echo "<br>";

echo $rumahSaya->gantiWarna("Biru");
echo "<br>";
echo "Warna rumah saya sekarang: " . $rumahSaya->warna;
echo "<br>";
echo $rumahSaya->kunciPintu();
echo "<hr>";

$rumahTetangga = new Rumah();
echo "Warna awal rumah tetangga: " . $rumahTetangga->warna;
?>