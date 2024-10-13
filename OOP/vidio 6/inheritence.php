<?php

use produk as GlobalProduk;

class Produk {
  public  $judul,
          $penulis,
          $penerbit,
          $harga,
          $jmlHalaman,
          $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0,)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jmlHalaman = $jmlHalaman;
    $this->waktuMain = $waktuMain;
  }

  public function getLabel(){
    return "$this->judul, $this->penulis";
  }

  public function getInfoproduk(){
    $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    return $str;
  }
}


class komik extends produk{
    public function getinfoproduk(){
        $str = "komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} halaman.";
        return $str;       
    }
}

class game extends produk{
    public function getinfoproduk(){
        $str = "game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->waktuMain} jam.";
        return $str;       
    }
}

class CetakInfoProduk {
  public function cetak( Produk $produk)
  {
    $str = "{$produk->judul} | {$produk->penulis} | {$produk->penerbit} | Rp. {$produk->harga}";
    return $str;
  }
}

$produk1 = new komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0,);
$produk2 = new game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 0, 50,);

//Komik : Naruto | Masashi Kishimoto | Shonen Jump | (Rp. 30000) - 100 Halaman.
// Game : Uncharted | Neil Druckmann | Sony Computer | (Rp. 250000) - 50 Jam.



echo $produk1->getInfoproduk();
echo "<br>";
echo $produk2->getInfoproduk();
?>