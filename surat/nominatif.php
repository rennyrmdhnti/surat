<?php include '../template/header.php'; ?>
<?php include '../template/sidebar.php'; ?>

<style>
#data-table_wrapper {
    overflow-x: auto;
}
</style>


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
        <?php include '../template/headbar.php'; ?>
        <div class="header-divider"></div>
        <div class="container-fluid">
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        span>Home</span>
                    </li>
                    <li class="breadcrumb-item active"><span>Dashboard</span></li>
                </ol>
            </nav> -->
        </div>
    </header>
    <div class="body px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Input</strong><span class="small ms-1"></div>
                        <!-- <div class="card-body">
                            
                        </div> -->
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-coreui-toggle="modal"
                                data-coreui-target="#exampleModal">
                                Data Tanpa Panjar
                            </button>
                            <button type="button" class="btn btn-primary" data-coreui-toggle="modal"
                                data-coreui-target="#exampleModal">
                                Data Panjar
                            </button>
                            <button type="button" class="btn btn-primary" data-coreui-toggle="modal"
                                data-coreui-target="#exampleModal">
                                Data Sisa Pencairan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Data</strong><span class="small ms-1"></div>
                        <div class="card-body">
                            <table id="data-table" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>No SPPD</th>
                                        <th>Nama</th>
                                        <th>Tujuan</th>
                                        <th>Lama</th>
                                        <th>Uang Harian</th>
                                        <th>Uang Hotel</th>
                                        <th>Uang Pesawat</th>
                                        <th>Transport Asal</th>
                                        <th>Transport Tujuan</th>
                                        <th>Uang Presentif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Surat Pertanggung Jawaban</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">No. SPPD</label>
                                <select class="form-select" id="no_sppd" name="no_sppd"
                                    aria-label="Default select example">
                                    <option value="">-- Pilih No SPPD --</option>
                                    <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT no_sppd FROM tb_perjalan_dinas GROUP BY no_sppd";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['no_sppd'] . "'>" . $row['no_sppd'] . "</option>";
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">No NPD</label>
                                <input type="text" class="form-control" id="no_npd" name="no_npd">
                                <small>Harap masukkan angka dari 001 hingga 999.</small>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <select class="form-select" id="nama" name="nama"
                                    aria-label="Default select example"></select>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan" readonly>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Lama</label>
                                <input type="text" class="form-control" id="lama" name="lama" readonly>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Uang Harian</label>
                                <input type="text" class="form-control" id="uang_harian" name="uang_harian">
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Hotel</label> <input
                                    class="form-check-input" type="checkbox" value="" id="myCheckbox">
                                <label class="form-check-label" for="myCheckbox">
                                    Pribadi
                                </label>
                                <input type="text" class="form-control" id="uang_harian" name="uang_harian">
                                <p style="color:red;" id="text_hotel_pribadi" name="text_hotel_pribadi"></p>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Pesawat</label> <input
                                    class="form-check-input" type="checkbox" value="" id="myCheckbox">
                                <label class="form-check-label" for="myCheckbox">
                                    Pribadi
                                </label>
                                <input type="text" class="form-control" id="uang_harian" name="uang_harian">
                                <p style="color:red;" id="text_pesawat_pribadi" name="text_pesawat_pribadi"></p>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Transport</label>
                                <input type="text" class="form-control" id="uang_harian" name="uang_harian">
                                <p style="color:red;">Rp. 150.000,00 (PP) </p>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Transport</label>
                                <input type="text" class="form-control" id="uang_harian" name="uang_harian">
                                <p style="color:red;" id="text_transport" name="text_transport"></p>
                            </div>
                            <br><br><br>
                            <div class="mb-2" style="margin-top: 15px !important;">
                                <input class="form-check-input" type="checkbox" value="" id="myCheckbox">
                                <label class="form-check-label" for="myCheckbox">
                                    Uang Presentatif
                                </label><input type="text" class="form-control" id="pengikut" name="pengikut">
                            </div>
                        </div>
                        <div class="col" style="margin-top: 501px !important;">
                            <div class="mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="myCheckbox">
                                <label class="form-check-label" for="myCheckbox">
                                    Travel
                                </label><input type="text" class="form-control" id="pengikut" name="pengikut">
                                <p style="color:red;" id="text_hotel_travel" name="text_hotel_travel"></p>
                            </div>
                            <div class="mb-2" style="margin-top: 15px !important;">
                                <input class="form-check-input" type="checkbox" value="" id="myCheckbox">
                                <label class="form-check-label" for="myCheckbox">
                                    Travel
                                </label><input type="text" class="form-control" id="pengikut" name="pengikut">
                                <p style="color:red;" id="text_pesawat_travel" name="text_pesawat_travel"></p>
                            </div>
                            <br><br>
                            Asal
                            <br><br><br>
                            Tujuan
                        </div>
                        <div class="col" style="margin-top: 490px !important;">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Travel</label>
                                <select class="form-select" id="hotel_travel" name="hotel_travel"
                                    aria-label="Default select example">
                                    <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT nama FROM tb_rek_travel";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Travel</label>
                                <select class="form-select" id="pesawat_travel" name="pesawat_travel"
                                    aria-label="Default select example">
                                    <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT nama FROM tb_rek_travel";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 501px !important;">
                            <div class="mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="myCheckbox">
                                <label class="form-check-label" for="myCheckbox">
                                    Lebih Pagu
                                </label>
                                <input type="text" class="form-control" id="lebih_pagu_hotel" name="lebih_pagu_hotel">
                            </div>
                            <div class="mb-2" style="margin-top: 15px !important;">
                                <input class="form-check-input" type="checkbox" value="" id="myCheckbox">
                                <label class="form-check-label" for="myCheckbox">
                                    Lebih Pagu
                                </label>
                                <input type="text" class="form-control" id="lebih_pagu_pesawat"
                                    name="lebih_pagu_pesawat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpanData()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <script>
    $(document).ready(function() {



        $('#no_sppd').on('change', function() {
            var selectedNoSPPD = $(this).val(); // Dapatkan nilai "no_sppd" yang dipilih
            // alert(selectedNoSPPD);
            // Lakukan permintaan AJAX untuk mengambil nama-nama berdasarkan "no_sppd" yang dipilih
            $.ajax({
                url: 'ambil_nama_sppd.php', // Ganti dengan URL sebenarnya yang mengambil data dari database
                method: 'POST',
                data: {
                    no_sppd: selectedNoSPPD
                },
                success: function(response) {
                    // Kosongkan opsi yang ada di dalam select box "nama"
                    $('#nama').empty();

                    // Tambahkan opsi "Pilih Nama" sebagai opsi default
                    $('#nama').append('<option value="">-- Pilih Nama --</option>');


                    // Parse response sebagai JSON
                    var data = JSON.parse(response);

                    // Iterasi data dan tambahkan sebagai opsi ke dalam select box "nama"
                    data.forEach(function(item) {
                        var optionText = item.nama;
                        $('#nama').append('<option value="' + item.nama + '">' +
                            optionText + '</option>');
                    });

                    $('#tujuan').val(data[0].tempat_tujuan);
                    $('#lama').val(data[0].lama);
                    $('#text_hotel_pribadi').text('');
                    $('#text_pesawat_pribadi').text('');
                    $('#text_hotel_travel').text('');
                    $('#text_pesawat_travel').text('');
                    $('#text_transport').text('');

                }
            });
        });

        $('#nama').on('change', function() {
            var selectedNama = $(this).val(); // Dapatkan nilai "nama" yang dipilih
            var selectedNoSPPD = $('#no_sppd').val(); // Dapatkan nilai "no_sppd" yang dipilih
            // alert(selectedNoSPPD);

            // Lakukan permintaan AJAX untuk mengambil data berdasarkan "nama" yang dipilih
            $.ajax({
                url: 'ambil_uang.php', // Ganti dengan URL sebenarnya yang mengambil data dari database
                method: 'POST',
                data: {
                    nama: selectedNama,
                    no_sppd: selectedNoSPPD
                },
                success: function(response) {
                    // Tindakan apa yang ingin Anda lakukan dengan respons?
                    // alert(response);
                    // Parse response sebagai JSON

                    var data = JSON.parse(response);

                    // Set nilai dari <input> dengan id "pengikut" dengan nilai dari response

                    var penginapan = data[0].penginapan;
                    var lama = data[0].lama;
                    var formatter = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    });
                    var formattedpenginapan = formatter.format(penginapan);
                    var formattedlama = lama + ' Hari';

                    var hasilPenginapan = formattedpenginapan + ' / ' + formattedlama;

                    var pesawat = data[0].pesawat;
                    var formatter = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    });
                    var formattedpesawat = formatter.format(pesawat) + ' (PP)';

                    var Transport = data[0].transportasi;
                    var formatter = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    });
                    var formattedTransport = formatter.format(Transport) + ' (PP)';


                    $('#text_hotel_pribadi').text(hasilPenginapan);
                    $('#text_pesawat_pribadi').text(formattedpesawat);
                    $('#text_hotel_travel').text(hasilPenginapan);
                    $('#text_pesawat_travel').text(formattedpesawat);
                    $('#text_transport').text(formattedTransport);


                }
            });
        });

        $("#editID").hide();
        var table = $('#data-table').DataTable({
            // "processing": true,
            // "serverSide": true,

            responsive: true,
            "ajax": {
                "url": "get_data_surat.php?data=sppd",
                "type": "POST"
            },
            "columns": [{
                    "data": ""
                },
                {
                    "data": "no_spt"
                },
                {
                    "data": "no_sppd"
                },
                {
                    "data": "maksud"
                },
                {
                    "data": "transportasi"
                },
                {
                    "data": "tempat_berangkat"
                },
                {
                    "data": "tempat_tujuan"
                },
                {
                    "data": "tanggal_berangkat"
                },
                {
                    "data": "tanggal_kembali"
                },
                {
                    "data": "lama"
                },
                {
                    "data": "pengikut"
                },
                {
                    "data": "instansi"
                },
                {
                    "data": "mata_anggaran"
                },
                {
                    "data": "keterangan"
                }
            ],
            "columnDefs": [{
                "targets": 0,
                "data": null,
                "render": function(data, type, row, meta) {
                    return meta.row + 1;
                }
            }],
            "createdRow": function(row, data, dataIndex) {
                // check if this is the last row
                var no_sppd = data.no_sppd.replace(/\//g, '').replace('Sekr/BPKPAD', '');

                if (dataIndex === (table.rows().count() - 1)) {
                    // add Edit button
                    $(row).append(
                        '<td><button class="btn btn-primary" onclick="print(\'' + no_sppd +
                        '\')"><i class="cil-print"></i></button></td>'
                    );
                    // add Edit button
                    $(row).append(
                        '<td><button class="btn btn-primary edit-button" data-id="' + no_sppd +
                        '"><i class="cil-pencil"></i></button></td>'
                    );
                    // add Delete button
                    $(row).append(
                        '<td><button class="btn btn-danger" onclick="deleteRow(\'' + no_sppd +
                        '\')"><i class="cil-trash"></i></button></td>'
                    );


                }
            }
        });
    });
    </script>


    <?php include '../template/footer.php'; ?>