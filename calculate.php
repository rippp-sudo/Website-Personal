<?php
// Daftar harga perubahan daya
$harga_perubahan_daya = array(
    '450-900' => 421650,
    '450-1300' => 796450,
    '450-2200' => 1639750,
    '450-3500' => 2955450,
    '450-4400' => 3827550,
    '450-5500' => 4893450,
    '900-1300' => 374800,
    '900-2200' => 1218100,
    '900-3500' => 2519400,
    '900-4400' => 3391500,
    '900-5500' => 4457400,
    '1300-2200' => 843300,
    '1300-3500' => 2131800,
    '1300-4400' => 3003900,
    '1300-5500' => 4069800,
    '2200-3500' => 1259700,
    '2200-4400' => 2131800,
    '2200-5500' => 3197700,
    '3500-4400' => 872100,
    '3500-5500' => 1938000,
    '4400-5500' => 1065900
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari formulir
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : null;
    $jenis_pembayaran = isset($_POST['jenis_pembayaran']) ? $_POST['jenis_pembayaran'] : null;
    $daya = isset($_POST['daya']) ? intval($_POST['daya']) : null;
    $token = isset($_POST['token']) ? intval($_POST['token']) : null;
    $daya_lama = isset($_POST['daya_lama']) ? intval($_POST['daya_lama']) : null;
    $daya_baru = isset($_POST['daya_baru']) ? intval($_POST['daya_baru']) : null;

    $result = '';

    // Perhitungan harga pasang baru
    if ($kategori === 'pasang_baru') {
        if ($jenis_pembayaran === 'prabayar') {
            $result = "Harga pasang baru untuk daya $daya VA dengan token Rp " . number_format($token, 0, ',', '.') . ".";
        } else {
            $result = "Harga pasang baru untuk daya $daya VA dengan pembayaran pasca bayar.";
        }
    }
    // Perhitungan harga perubahan daya
    elseif ($kategori === 'perubahan_daya' && $daya_lama && $daya_baru) {
        $key = $daya_lama . '-' . $daya_baru;
        if (array_key_exists($key, $harga_perubahan_daya)) {
            $result = "Harga perubahan daya dari $daya_lama VA ke $daya_baru VA adalah Rp " . number_format($harga_perubahan_daya[$key], 0, ',', '.');
        } else {
            $result = "Harga perubahan daya dari $daya_lama VA ke $daya_baru VA tidak ditemukan.";
        }
    } else {
        $result = "Data yang dimasukkan tidak valid.";
    }

    echo $result;
}
?>
