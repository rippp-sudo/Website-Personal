<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Harga Permohonan Listrik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS Kustom untuk memastikan modal berada di tengah layar */
        .modal-dialog {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
            margin: 1.75rem auto;
        }

        @media (max-width: 767.98px) {
            .modal-dialog {
                margin: 1rem;
                max-width: 100%;
                width: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="flex-grow: 1;">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 600px;">
            <h2 class="card-title text-center">Hitung Harga Permohonan Listrik</h2>

            <!-- Tombol untuk Pasang Baru dan Perubahan Daya -->
            <div class="card mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Pilih Jenis Permohonan</h5>
                    <div class="d-flex justify-content-center mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPasangBaru">
                            Pasang Baru
                        </button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalPerubahanDaya">
                            Perubahan Daya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pasang Baru -->
    <div class="modal fade" id="modalPasangBaru" tabindex="-1" role="dialog" aria-labelledby="modalPasangBaruLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPasangBaruLabel">Pasang Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formPasangBaru">
                        <div class="form-group">
                            <label for="dayaPasangBaru">Daya (VA):</label>
                            <select name="daya" id="dayaPasangBaru" class="form-control" required>
                                <option value="">Pilih Daya</option>
                                <!-- Tambahkan opsi daya di sini -->
                                <option value="450">450 VA</option>
                                <option value="900">900 VA</option>
                                <option value="1300">1.300 VA</option>
                                <option value="2200">2.200 VA</option>
                                <option value="3500">3.500 VA</option>
                                <option value="4400">4.400 VA</option>
                                <option value="5500">5.500 VA</option>
                                <option value="6600">6.600 VA</option>
                                <option value="7700">7.700 VA</option>
                                <option value="10600">10.600 VA</option>
                                <option value="11000">11.000 VA</option>
                                <option value="13200">13.200 VA</option>
                                <option value="16500">16.500 VA</option>
                                <option value="23000">23.000 VA</option>
                                <option value="33000">33.000 VA</option>
                                <option value="41500">41.500 VA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenisPembayaranPasangBaru">Jenis Pembayaran:</label>
                            <select name="jenis_pembayaran" id="jenisPembayaranPasangBaru" class="form-control" onchange="toggleTokenPasangBaru()" required>
                                <option value="">Pilih Jenis Pembayaran</option>
                                <option value="prabayar">Prabayar</option>
                                <option value="pasca_bayar">Pasca Bayar</option>
                            </select>
                        </div>
                        <div id="tokenPasangBaruDiv" style="display: none;">
                            <div class="form-group">
                                <label for="tokenPasangBaru">Token:</label>
                                <select name="token" id="tokenPasangBaru" class="form-control">
                                    <option value="">Pilih Token</option>
                                    <option value="5000">Rp 5.000</option>
                                    <option value="20000">Rp 20.000</option>
                                    <option value="40000">Rp 40.000</option>
                                    <option value="50000">Rp 50.000</option>
                                    <option value="100000">Rp 100.000</option>
                                    <option value="200000">Rp 200.000</option>
                                    <option value="500000">Rp 500.000</option>
                                    <option value="1000000">Rp 1.000.000</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-block mt-4" onclick="hitungPasangBaru()">Hitung Harga</button>
                    </form>
                    <div id="resultPasangBaru" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Perubahan Daya -->
    <div class="modal fade" id="modalPerubahanDaya" tabindex="-1" role="dialog" aria-labelledby="modalPerubahanDayaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPerubahanDayaLabel">Perubahan Daya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formPerubahanDaya">
                        <div class="form-group">
                            <label for="dayaLama">Daya Lama (VA):</label>
                            <select name="daya_lama" id="dayaLama" class="form-control">
                                <option value="">Pilih Daya Lama</option>
                                <!-- Tambahkan opsi daya lama di sini -->
                                <option value="450">450 VA</option>
                                <option value="900">900 VA</option>
                                <option value="1300">1.300 VA</option>
                                <option value="2200">2.200 VA</option>
                                <option value="3500">3.500 VA</option>
                                <option value="4400">4.400 VA</option>
                                <option value="5500">5.500 VA</option>
                                <option value="6600">6.600 VA</option>
                                <option value="7700">7.700 VA</option>
                                <option value="10600">10.600 VA</option>
                                <option value="11000">11.000 VA</option>
                                <option value="13200">13.200 VA</option>
                                <option value="16500">16.500 VA</option>
                                <option value="23000">23.000 VA</option>
                                <option value="33000">33.000 VA</option>
                                <option value="41500">41.500 VA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dayaBaru">Daya Baru (VA):</label>
                            <select name="daya_baru" id="dayaBaru" class="form-control">
                                <option value="">Pilih Daya Baru</option>
                                <!-- Tambahkan opsi daya baru di sini -->
                                <option value="450">450 VA</option>
                                <option value="900">900 VA</option>
                                <option value="1300">1.300 VA</option>
                                <option value="2200">2.200 VA</option>
                                <option value="3500">3.500 VA</option>
                                <option value="4400">4.400 VA</option>
                                <option value="5500">5.500 VA</option>
                                <option value="6600">6.600 VA</option>
                                <option value="7700">7.700 VA</option>
                                <option value="10600">10.600 VA</option>
                                <option value="11000">11.000 VA</option>
                                <option value="13200">13.200 VA</option>
                                <option value="16500">16.500 VA</option>
                                <option value="23000">23.000 VA</option>
                                <option value="33000">33.000 VA</option>
                                <option value="41500">41.500 VA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenisPembayaranPerubahanDaya">Jenis Pembayaran:</label>
                            <select name="jenis_pembayaran" id="jenisPembayaranPerubahanDaya" class="form-control" onchange="toggleTokenPerubahanDaya()" required>
                                <option value="">Pilih Jenis Pembayaran</option>
                                <option value="prabayar">Prabayar</option>
                                <option value="pasca_bayar">Pasca Bayar</option>
                            </select>
                        </div>
                        <div id="tokenPerubahanDayaDiv" style="display: none;">
                            <div class="form-group">
                                <label for="tokenPerubahanDaya">Token:</label>
                                <select name="token" id="tokenPerubahanDaya" class="form-control">
                                    <option value="">Pilih Token</option>
                                    <option value="5000">Rp 5.000</option>
                                    <option value="20000">Rp 20.000</option>
                                    <option value="40000">Rp 40.000</option>
                                    <option value="50000">Rp 50.000</option>
                                    <option value="100000">Rp 100.000</option>
                                    <option value="200000">Rp 200.000</option>
                                    <option value="500000">Rp 500.000</option>
                                    <option value="1000000">Rp 1.000.000</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-block mt-4" onclick="hitungPerubahanDaya()">Hitung Harga</button>
                    </form>
                    <div id="resultPerubahanDaya" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        function toggleTokenPasangBaru() {
            var jenisPembayaran = document.getElementById('jenisPembayaranPasangBaru').value;
            var tokenDiv = document.getElementById('tokenPasangBaruDiv');
            tokenDiv.style.display = (jenisPembayaran === 'prabayar') ? 'block' : 'none';
        }

        function toggleTokenPerubahanDaya() {
            var jenisPembayaran = document.getElementById('jenisPembayaranPerubahanDaya').value;
            var tokenDiv = document.getElementById('tokenPerubahanDayaDiv');
            tokenDiv.style.display = (jenisPembayaran === 'prabayar') ? 'block' : 'none';
        }

        function hitungPasangBaru() {
            var daya = document.getElementById('dayaPasangBaru').value;
            var jenisPembayaran = document.getElementById('jenisPembayaranPasangBaru').value;
            var token = document.getElementById('tokenPasangBaru') ? parseInt(document.getElementById('tokenPasangBaru').value) : 0;
            
            var tarif_per_kwh = 1444.70;
            var tarif = (jenisPembayaran === 'prabayar') ? daya * tarif_per_kwh : daya * tarif_per_kwh * 0.9;
            if (jenisPembayaran === 'prabayar' && token > 0) {
                tarif += token;
            }

            var penjelasan = "Daya (" + daya + " VA) x Tarif per kWh (Rp " + tarif_per_kwh.toFixed(2).replace('.', ',') + ")";
            penjelasan += (jenisPembayaran === 'prabayar') ? " untuk Prabayar." : " untuk Pasca Bayar (diskon 10%).";
            if (jenisPembayaran === 'prabayar' && token > 0) {
                penjelasan += "<br>+ Harga token sebesar Rp " + token.toLocaleString('id-ID') + ".";
            }

            var resultDiv = document.getElementById('resultPasangBaru');
            resultDiv.innerHTML = "<strong>Total Harga yang harus dibayar:</strong> Rp " + tarif.toLocaleString('id-ID') + "<br><br>" + penjelasan;
        }

        function hitungPerubahanDaya() {
            var dayaLama = parseInt(document.getElementById('dayaLama').value);
            var dayaBaru = parseInt(document.getElementById('dayaBaru').value);
            var jenisPembayaran = document.getElementById('jenisPembayaranPerubahanDaya').value;
            var token = document.getElementById('tokenPerubahanDaya') ? parseInt(document.getElementById('tokenPerubahanDaya').value) : 0;
            
            var tarif_per_kwh = 1444.70;
            var selisih_daya = dayaBaru - dayaLama;
            var tarif = (jenisPembayaran === 'prabayar') ? selisih_daya * tarif_per_kwh * 1.5 : selisih_daya * tarif_per_kwh * 1.3;
            if (jenisPembayaran === 'prabayar' && token > 0) {
                tarif += token;
            }

            var penjelasan = "Selisih Daya (" + selisih_daya + " VA) x Tarif per kWh (Rp " + tarif_per_kwh.toFixed(2).replace('.', ',') + ")";
            penjelasan += (jenisPembayaran === 'prabayar') ? " dengan faktor 1.5 untuk Prabayar." : " dengan faktor 1.3 untuk Pasca Bayar.";
            if (jenisPembayaran === 'prabayar' && token > 0) {
                penjelasan += "<br>+ Harga token sebesar Rp " + token.toLocaleString('id-ID') + ".";
            }

            var resultDiv = document.getElementById('resultPerubahanDaya');
            resultDiv.innerHTML = "<strong>Total Harga yang harus dibayar:</strong> Rp " + tarif.toLocaleString('id-ID') + "<br><br>" + penjelasan;
        }
    </script>
</body>
</html>
