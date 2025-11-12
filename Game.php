<?php

class Game extends Produk {
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk() {
        $str = "Game: " . parent::getILabel() . " - {$this->waktuMain} Jam.";
        return $str;
    }
}

$produk1 = new Game("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("One Piece", "Eiichiro Oda", "Shonen Jump", 35000, 120);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();