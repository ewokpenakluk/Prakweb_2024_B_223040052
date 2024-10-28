<?php 

class flasher {

    public static function setFlash($pesan, $aksi, $tipe) {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'paksi' => $aksi,
            'tipe' => $tipe,

        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' 
                . (isset($_SESSION['flash']['aksi']) ? $_SESSION['flash']['aksi'] : '') . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    
            unset($_SESSION['flash']);
        }
    }
    

}