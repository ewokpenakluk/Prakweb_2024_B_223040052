<?php

use produk as GlobalProduk;

class Produk
{
  public $judul,
    $penulis,
    $penerbit,
    $harga ;
    public function __construct( $judul="judul", $penulis="penulis", $penerbit= "penerbit", $harga= 0 ){
        $this->judul=$judul;
        $this->penulis=$penulis;
        $this->penerbit=$penerbit;
        $this->harga=$harga;
    }
    
        


  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }
}
class CetakInfoProduk{
    public function cetak ( produk $produk){
        $str = "{$produk->judul}| {$produk->getlabel()} Shonen Jump ( Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new Produk("Naruro","mashashi kishimoto","shonen jump",30000);
$produk2 = new Produk("uncharted","Neil Druckman", "Sony Computer", 20000);



echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";

$infoproduk1 = new CetakInfoProduk();
echo $infoproduk1->cetak($produk1);