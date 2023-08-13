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
                                        <th>Nama</th>
                                        <th>No NPD</th>
                                        <th>Tujuan</th>
                                        <th>Lama</th>
                                        <th>Uang Harian</th>
                                        <th>Uang Hotel</th>
                                        <th>Uang Pesawat</th>
                                        <th>Transport</th>
                                        <th>Status</th>
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
                                    class="form-check-input" type="checkbox" value="" id="check_hotel_pribadi">
                                <label class="form-check-label" for="myCheckbox">
                                    Pribadi
                                </label>
                                <input type="text" class="form-control" id="hotel_pribadi" name="hotel_pribadi"
                                    disabled>
                                <p style="color:red;" id="text_hotel_pribadi" name="text_hotel_pribadi"></p>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Pesawat</label> <input
                                    class="form-check-input" type="checkbox" value="" id="check_pesawat_pribadi">
                                <label class="form-check-label" for="myCheckbox">
                                    Pribadi
                                </label>
                                <input type="text" class="form-control" id="pesawat_pribadi" name="pesawat_pribadi"
                                    disabled>
                                <p style="color:red;" id="text_pesawat_pribadi" name="text_pesawat_pribadi"></p>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Transport</label>
                                <input type="text" class="form-control" id="transport_asal" name="transport_asal">
                                <p style="color:red;">Rp. 150.000,00 (PP) </p>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Transport</label>
                                <input type="text" class="form-control" id="transport_tujuan" name="transport_tujuan">
                                <p style="color:red;" id="text_transport" name="text_transport"></p>
                            </div>
                            <br><br><br>
                            <div class="mb-2" style="margin-top: 15px !important;">
                                <input class="form-check-input" type="checkbox" value="" id="check_uang_presentatif">
                                <label class="form-check-label" for="myCheckbox">
                                    Uang Presentatif
                                </label><input type="text" class="form-control" id="uang_presentatif"
                                    name="uang_presentatif" disabled>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 501px !important;">
                            <div class="mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="check_hotel_travel">
                                <label class="form-check-label" for="myCheckbox">
                                    Travel
                                </label><input type="text" class="form-control" id="hotel_travel" name="hotel_travel"
                                    disabled>
                                <p style="color:red;" id="text_hotel_travel" name="text_hotel_travel"></p>
                            </div>
                            <div class="mb-2" style="margin-top: 15px !important;">
                                <input class="form-check-input" type="checkbox" value="" id="check_pesawat_travel">
                                <label class="form-check-label" for="myCheckbox">
                                    Travel
                                </label><input type="text" class="form-control" id="pesawat_travel"
                                    name="pesawat_travel" disabled>
                                <p style="color:red;" id="text_pesawat_travel" name="text_pesawat_travel"></p>
                            </div>
                            <br><br>
                            Asal
                            <br><br><br><br>
                            Tujuan
                        </div>
                        <div class="col" style="margin-top: 490px !important;">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Travel</label>
                                <select class="form-select" id="select_hotel_travel" name="select_hotel_travel"
                                    aria-label="Default select example" disabled>
                                    <option value="">-- Pilih Travel --</option>
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
                                <select class="form-select" id="select_pesawat_travel" name="select_pesawat_travel"
                                    aria-label="Default select example" disabled>
                                    <option value="">-- Pilih Travel --</option>
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
                                <input class="form-check-input" type="checkbox" value="" id="check_lebih_hotel">
                                <label class="form-check-label" for="myCheckbox">
                                    Lebih Pagu
                                </label>
                                <input type="text" class="form-control" id="lebih_pagu_hotel" name="lebih_pagu_hotel"
                                    disabled>
                            </div>
                            <div class="mb-2" style="margin-top: 15px !important;">
                                <input class="form-check-input" type="checkbox" value="" id="check_lebih_pesawat">
                                <label class="form-check-label" for="myCheckbox">
                                    Lebih Pagu
                                </label>
                                <input type="text" class="form-control" id="lebih_pagu_pesawat"
                                    name="lebih_pagu_pesawat" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpanDataTanpaPanjar()">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Input Surat Pertanggung Jawaban</h5>
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
                                    class="form-check-input" type="checkbox" value="" id="check_hotel_pribadi">
                                <label class="form-check-label" for="myCheckbox">
                                    Pribadi
                                </label>
                                <input type="text" class="form-control" id="hotel_pribadi" name="hotel_pribadi"
                                    disabled>
                                <p style="color:red;" id="text_hotel_pribadi" name="text_hotel_pribadi"></p>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Pesawat</label> <input
                                    class="form-check-input" type="checkbox" value="" id="check_pesawat_pribadi">
                                <label class="form-check-label" for="myCheckbox">
                                    Pribadi
                                </label>
                                <input type="text" class="form-control" id="pesawat_pribadi" name="pesawat_pribadi"
                                    disabled>
                                <p style="color:red;" id="text_pesawat_pribadi" name="text_pesawat_pribadi"></p>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Transport</label>
                                <input type="text" class="form-control" id="transport_asal" name="transport_asal">
                                <p style="color:red;">Rp. 150.000,00 (PP) </p>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Transport</label>
                                <input type="text" class="form-control" id="transport_tujuan" name="transport_tujuan">
                                <p style="color:red;" id="text_transport" name="text_transport"></p>
                            </div>
                            <br><br><br>
                            <div class="mb-2" style="margin-top: 15px !important;">
                                <input class="form-check-input" type="checkbox" value="" id="check_uang_presentatif">
                                <label class="form-check-label" for="myCheckbox">
                                    Uang Presentatif
                                </label><input type="text" class="form-control" id="uang_presentatif"
                                    name="uang_presentatif" disabled>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 501px !important;">
                            <div class="mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="check_hotel_travel">
                                <label class="form-check-label" for="myCheckbox">
                                    Travel
                                </label><input type="text" class="form-control" id="hotel_travel" name="hotel_travel"
                                    disabled>
                                <p style="color:red;" id="text_hotel_travel" name="text_hotel_travel"></p>
                            </div>
                            <div class="mb-2" style="margin-top: 15px !important;">
                                <input class="form-check-input" type="checkbox" value="" id="check_pesawat_travel">
                                <label class="form-check-label" for="myCheckbox">
                                    Travel
                                </label><input type="text" class="form-control" id="pesawat_travel"
                                    name="pesawat_travel" disabled>
                                <p style="color:red;" id="text_pesawat_travel" name="text_pesawat_travel"></p>
                            </div>
                            <br><br>
                            Asal
                            <br><br><br><br>
                            Tujuan
                        </div>
                        <div class="col" style="margin-top: 490px !important;">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Travel</label>
                                <select class="form-select" id="select_hotel_travel" name="select_hotel_travel"
                                    aria-label="Default select example" disabled>
                                    <option value="">-- Pilih Travel --</option>
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
                                <select class="form-select" id="select_pesawat_travel" name="select_pesawat_travel"
                                    aria-label="Default select example" disabled>
                                    <option value="">-- Pilih Travel --</option>
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
                                <input class="form-check-input" type="checkbox" value="" id="check_lebih_hotel">
                                <label class="form-check-label" for="myCheckbox">
                                    Lebih Pagu
                                </label>
                                <input type="text" class="form-control" id="lebih_pagu_hotel" name="lebih_pagu_hotel"
                                    disabled>
                            </div>
                            <div class="mb-2" style="margin-top: 15px !important;">
                                <input class="form-check-input" type="checkbox" value="" id="check_lebih_pesawat">
                                <label class="form-check-label" for="myCheckbox">
                                    Lebih Pagu
                                </label>
                                <input type="text" class="form-control" id="lebih_pagu_pesawat"
                                    name="lebih_pagu_pesawat" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpanDataTanpaPanjar()">Save
                        changes</button>
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
        var table;

        if (<?php echo $status_login ?> === 0) {
            table = $('#data-table').DataTable({
                responsive: true,
                "ajax": {
                    "url": "get_data_surat.php?data=nominatif",
                    "type": "POST"
                },
                "columns": [{
                        "data": ""
                    },
                    {
                        "data": "nama"
                    },
                    {
                        "data": "no_npd"
                    },
                    {
                        "data": "tujuan"
                    },
                    {
                        "data": "lama"
                    },
                    {
                        "data": "uang_harian",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "hotel",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "pesawat",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "transport",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "status"
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
                    if (dataIndex === (table.rows().count() - 1)) {
                        $(row).append(
                            '<td><button class="btn btn-primary edit-button" data-id="' + data
                            .id +
                            '"><i class="cil-pencil"></i></button></td>'
                        );
                        $(row).append(
                            '<td><button class="btn btn-danger" onclick="deleteRow(\'' + data
                            .id +
                            '\')"><i class="cil-trash"></i></button></td>'
                        );
                    }
                }
            });
        } else {
            table = $('#data-table').DataTable({
                responsive: true,
                "ajax": {
                    "url": "get_data_surat.php?data=nominatif",
                    "type": "POST"
                },
                "columns": [{
                        "data": ""
                    },
                    {
                        "data": "nama"
                    },
                    {
                        "data": "no_npd"
                    },
                    {
                        "data": "tujuan"
                    },
                    {
                        "data": "lama"
                    },
                    {
                        "data": "uang_harian",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "hotel",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "pesawat",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "transport",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "status"
                    }
                ],
                "columnDefs": [{
                    "targets": 0,
                    "data": null,
                    "render": function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                }]
            });
        }

    });

    const checkbox_lebih_hotel = document.getElementById('check_lebih_hotel');
    const inputText_lebih_hotel = document.getElementById('lebih_pagu_hotel');
    checkbox_lebih_hotel.addEventListener('change', function() {
        if (this.checked) {
            inputText_lebih_hotel.disabled = false;
        } else {
            inputText_lebih_hotel.disabled = true;
            inputText_lebih_hotel.value = ''; // Menghapus nilai input
        }
    });

    const checkbox_lebih_pesawat = document.getElementById('check_lebih_pesawat');
    const inputText_lebih_pesawat = document.getElementById('lebih_pagu_pesawat');
    checkbox_lebih_pesawat.addEventListener('change', function() {
        if (this.checked) {
            inputText_lebih_pesawat.disabled = false;
        } else {
            inputText_lebih_pesawat.disabled = true;
            inputText_lebih_pesawat.value = ''; // Menghapus nilai input
        }
    });

    const checkbox_hotel_pribadi = document.getElementById('check_hotel_pribadi');
    const checkbox_hotel_travel = document.getElementById('check_hotel_travel');
    const inputText_hotel_pribadi = document.getElementById('hotel_pribadi');
    const inputText_hotel_travel = document.getElementById('hotel_travel');
    const select_hotel_travel = document.getElementById('select_hotel_travel');

    checkbox_hotel_pribadi.addEventListener('change', function() {
        if (this.checked) {
            checkbox_hotel_travel.checked = false;
            inputText_hotel_pribadi.disabled = false;
            inputText_hotel_travel.disabled = true;
            inputText_hotel_travel.value = '';
            select_hotel_travel.disabled = true;
        } else {
            inputText_hotel_pribadi.disabled = true;
            inputText_hotel_pribadi.value = '';
        }
    });

    checkbox_hotel_travel.addEventListener('change', function() {
        if (this.checked) {
            checkbox_hotel_pribadi.checked = false;
            inputText_hotel_travel.disabled = false;
            select_hotel_travel.disabled = false;
            inputText_hotel_pribadi.disabled = true;
            inputText_hotel_pribadi.value = '';
        } else {
            inputText_hotel_travel.disabled = true;
            inputText_hotel_travel.value = '';
            select_hotel_travel.disabled = true;
        }
    });


    const checkbox_pesawat_pribadi = document.getElementById('check_pesawat_pribadi');
    const checkbox_pesawat_travel = document.getElementById('check_pesawat_travel');
    const inputText_pesawat_pribadi = document.getElementById('pesawat_pribadi');
    const inputText_pesawat_travel = document.getElementById('pesawat_travel');
    const select_pesawat_travel = document.getElementById('select_pesawat_travel');

    checkbox_pesawat_pribadi.addEventListener('change', function() {
        if (this.checked) {
            checkbox_pesawat_travel.checked = false;
            inputText_pesawat_pribadi.disabled = false;
            inputText_pesawat_travel.disabled = true;
            inputText_pesawat_travel.value = '';
            select_pesawat_travel.disabled = true;
        } else {
            inputText_pesawat_pribadi.disabled = true;
            inputText_pesawat_pribadi.value = '';
        }
    });

    checkbox_pesawat_travel.addEventListener('change', function() {
        if (this.checked) {
            checkbox_pesawat_pribadi.checked = false;
            inputText_pesawat_travel.disabled = false;
            select_pesawat_travel.disabled = false;
            inputText_pesawat_pribadi.disabled = true;
            inputText_pesawat_pribadi.value = '';
        } else {
            inputText_pesawat_travel.disabled = true;
            inputText_pesawat_travel.value = '';
            select_pesawat_travel.disabled = true;
        }
    });


    const checkbox_uang_presentatif = document.getElementById('check_uang_presentatif');
    const inputText_uang_presentatif = document.getElementById('uang_presentatif');
    checkbox_uang_presentatif.addEventListener('change', function() {
        if (this.checked) {
            inputText_uang_presentatif.disabled = false;
        } else {
            inputText_uang_presentatif.disabled = true;
            inputText_uang_presentatif.value = ''; // Menghapus nilai input
        }
    });

    function simpanDataTanpaPanjar() {
        var nosppd = $('#no_sppd').val();
        var nonpd = $('#no_npd').val();
        var nama = $('#nama').val();
        var tujuan = $('#tujuan').val();
        var lama = $('#lama').val();
        var uang_harian = $('#uang_harian').val();
        var hotel_pribadi = $('#hotel_pribadi').val();
        var pesawat_pribadi = $('#pesawat_pribadi').val();
        var transport_asal = $('#transport_asal').val();
        var transport_tujuan = $('#transport_tujuan').val();
        var uang_presentatif = $('#uang_presentatif').val();
        var hotel_travel = $('#hotel_travel').val();
        var pesawat_travel = $('#pesawat_travel').val();
        var lebih_pagu_hotel = $('#lebih_pagu_hotel').val();
        var lebih_pagu_pesawat = $('#lebih_pagu_pesawat').val();
        var select_hotel_travel = $('#select_hotel_travel').val();
        var select_pesawat_travel = $('#select_pesawat_travel').val();

        $.ajax({
            url: 'nominatif_simpan.php',
            method: 'POST',
            data: {
                status: 'Tanpa Panjar',
                no_sppd: nosppd,
                no_npd: nonpd,
                nama: nama,
                tujuan: tujuan,
                lama: lama,
                uang_harian: uang_harian,
                hotel_pribadi: hotel_pribadi,
                pesawat_pribadi: pesawat_pribadi,
                transport_asal: transport_asal,
                transport_tujuan: transport_tujuan,
                uang_presentatif: uang_presentatif,
                hotel_travel: hotel_travel,
                pesawat_travel: pesawat_travel,
                lebih_pagu_hotel: lebih_pagu_hotel,
                lebih_pagu_pesawat: lebih_pagu_pesawat,
                select_hotel_travel: select_hotel_travel,
                select_pesawat_travel: select_pesawat_travel
            },
            success: function(response) {
                // Handle response dari server setelah data disimpan
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response,
                    confirmButtonText: 'OK',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return new Promise((resolve) => {
                            // Mengatur waktu delay sebelum mengarahkan ke halaman 'perintah_tugas.php'
                            setTimeout(() => {
                                resolve();
                            }, 3000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'nominatif.php';
                    }
                });
            },
            error: function(xhr, status, error) {
                // Handle error jika terjadi masalah saat mengirimkan data
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat menyimpan data. Silakan coba lagi.");
            }
        });

    }

    // Mengatur nilai-nilai data dalam modal edit berdasarkan data yang dipilih
    function openEditModal(data) {
        $('#edit_propinsi').val(data.nama_provinsi);
        $('#edit_satuan').val(data.satuan);
        $('#edit_besaran').val(data.besaran);
        $('#transportasi').val(data.id);
        // Buka modal edit
        $('#editModal').modal('show');
    }


    // Mengambil data pegawai berdasarkan ID
    function getDataById(id) {
        // Lakukan permintaan AJAX untuk mendapatkan data pegawai berdasarkan ID
        $.ajax({
            url: 'get_data_by_id.php', // Ganti dengan URL yang sesuai untuk mengambil data pegawai berdasarkan ID
            type: 'POST',
            data: {
                get_data: 'nominatif',
                id: id
            },
            success: function(response) {
                // Mengambil objek data pegawai dari respon
                var data = JSON.parse(response);
                // console.log(response);
                // Membuka modal edit dan mengisi nilai-nilai data di dalamnya
                openEditModal(data['data'][0]);
            },
            error: function(xhr, status, error) {
                // Tindakan yang dilakukan jika terjadi kesalahan dalam permintaan AJAX
                console.error(xhr.responseText);
            }
        });
    }

    // Mengatur tindakan untuk tombol "Edit" pada baris tabel
    $(document).on('click', '.edit-button', function() {
        var id = $(this).data('id');
        getDataById(id);
    });
    </script>


    <?php include '../template/footer.php'; ?>