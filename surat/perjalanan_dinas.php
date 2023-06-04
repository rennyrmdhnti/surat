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
                                Tambah Data
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
                                        <th>No SPT</th>
                                        <th>No SPPD</th>
                                        <th>Maksud Perjadi</th>
                                        <th>Alat Transportasi</th>
                                        <th>Tempat Berangkat</th>
                                        <th>Tempat Tujuan</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Lama</th>
                                        <th>Pengikut</th>
                                        <th>Instansi</th>
                                        <th>Mata Anggaran</th>
                                        <th>Keterangan</th>
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Surat Perjalanan Dinas</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No. SPT</label>
                                <select class="form-select" id="no_spt" name="no_spt" aria-label="Default select example" >
                                    <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT no_spt FROM tb_perintah_tugas GROUP BY no_spt";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['no_spt'] . "'>" . $row['no_spt'] . "</option>";
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No SPPD</label>
                                <input type="text" class="form-control" id="no_sppd" name="no_sppd">
                                <small>Harap masukkan angka dari 001 hingga 999.</small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Maksud Perjadin</label>
                                <textarea class="form-control" id="maksud" name="maksud" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alat Transportasi</label>
                                <select class="form-select" aria-label="Default select example" id="transportasi" name="transportasi"> 
                                    <option selected>Pilih Transportasi</option>
                                    <option value="Pesawat atau Transportasi Lain yang Menunjang">Pesawat atau Transportasi Lain yang Menunjang</option>
                                    <option value="Mobil atau Transportasi Lain yang Menunjang">Mobil atau Transportasi Lain yang Menunjang</option>
                                    <option value="Kereta Api atau Transportasi Lain yang Menunjang">Kereta Api atau Transportasi Lain yang Menunjang</option>
                                    <option value="Kapal atau Transportasi Lain yang Menunjang">Kapal atau Transportasi Lain yang Menunjang</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tempat Berangkat</label>
                                <input type="text" class="form-control" id="tempat_berangkat" name="tempat_berangkat"
                                    value="Banjarmasin" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tempat Tujuan</label>
                                <select class="form-select" id="selectTujuan" aria-label="Default select example">
                                    <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT tb_propinsi.nama as propinsi ,tb_kabupaten.nama as kabupaten FROM tb_propinsi LEFT JOIN tb_kabupaten ON tb_kabupaten.propinsi_id = tb_propinsi.id";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['kabupaten'] . "'>" . $row['propinsi'] . " - " . $row["kabupaten"] . "</option>";
                                        }

                                        ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Berangkat</label>
                                <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
                                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Lama</label>
                                <input type="text" class="form-control" id="lama" name="lama" readonly>
                            </div>

                        </div>
                        <div class="col" style="margin-top: 87px !important;">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pengikut</label>
                                <input type="text" class="form-control" id="pengikut" name="pengikut">
                            </div><br>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Instansi</label>
                                <input class="form-control" id="instansi" name="instansi" rows="2"
                                    value='Badan Pengelola Keuangan, Pendapatan dan Aset Daerah' readonly></input>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Mata Anggaran</label>
                                <textarea class="form-control" id="mata_anggaran" name="mata_anggaran" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Input Surat Perjalanan Dinas</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No. SPT</label>
                                <select class="form-select" id="edit_nospt" name="edit_nospt" aria-label="Default select example" >
                                    <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT no_spt FROM tb_perintah_tugas GROUP BY no_spt";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['no_spt'] . "'>" . $row['no_spt'] . "</option>";
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No SPPD</label>
                                <input type="text" class="form-control" id="edit_nosppd" name="edit_nosppd">
                                <small>Harap masukkan angka dari 001 hingga 999.</small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Maksud Perjadin</label>
                                <textarea class="form-control" id="edit_maksud" name="edit_maksud" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alat Transportasi</label>
                                <select class="form-select" aria-label="Default select example" id="edit_transportasi" name="edit_transportasi"> 
                                    <option selected>Pilih Transportasi</option>
                                    <option value="Pesawat atau Transportasi Lain yang Menunjang">Pesawat atau Transportasi Lain yang Menunjang</option>
                                    <option value="Mobil atau Transportasi Lain yang Menunjang">Mobil atau Transportasi Lain yang Menunjang</option>
                                    <option value="Kereta Api atau Transportasi Lain yang Menunjang">Kereta Api atau Transportasi Lain yang Menunjang</option>
                                    <option value="Kapal atau Transportasi Lain yang Menunjang">Kapal atau Transportasi Lain yang Menunjang</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tempat Berangkat</label>
                                <input type="text" class="form-control" id="edit_tempat_berangkat" name="edit_tempat_berangkat"
                                    value="Banjarmasin" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tempat Tujuan</label>
                                <select class="form-select" id="edit_select_tujuan" aria-label="Default select example">
                                    <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT tb_propinsi.nama as propinsi ,tb_kabupaten.nama as kabupaten FROM tb_propinsi LEFT JOIN tb_kabupaten ON tb_kabupaten.propinsi_id = tb_propinsi.id";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['kabupaten'] . "'>" . $row['propinsi'] . " - " . $row["kabupaten"] . "</option>";
                                        }

                                        ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Berangkat</label>
                                <input type="date" class="form-control" id="edit_tanggal_berangkat" name="edit_tanggal_berangkat">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
                                <input type="date" class="form-control" id="edit_tanggal_kembali" name="edit_tanggal_kembali">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Lama</label>
                                <input type="text" class="form-control" id="edit_lama" name="edit_lama" readonly>
                            </div>

                        </div>
                        <div class="col" style="margin-top: 87px !important;">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pengikut</label>
                                <input type="text" class="form-control" id="edit_pengikut" name="edit_pengikut">
                            </div><br>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Instansi</label>
                                <input class="form-control" id="edit_instansi" name="edit_instansi" rows="2"
                                    value='Badan Pengelola Keuangan, Pendapatan dan Aset Daerah' readonly></input>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Mata Anggaran</label>
                                <textarea class="form-control" id="edit_mata_anggaran" name="edit_mata_anggaran" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="edit_keterangan" name="edit_keterangan">
                                <input type="text" class="form-control" id="editID" name="editID" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="EditData()">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script>
    var inputNoSPPD = document.getElementById("no_sppd");
    inputNoSPPD.addEventListener("input", function() {
        var value = this.value;
        var formattedValue = value.replace(/\D/g, ''); // Menghapus karakter non-angka

        if (formattedValue.length > 3) {
            formattedValue = formattedValue.substr(0, 3); // Mengambil tiga digit pertama
        }

        if (formattedValue !== value) {
            this.value = formattedValue; // Mengupdate nilai input dengan nilai yang telah diformat
        }
    });

    $(document).ready(function() {
        
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

    function calculateDuration() {
        const departureDate = new Date(document.getElementById("tanggal_berangkat").value);
        const returnDate = new Date(document.getElementById("tanggal_kembali").value);
        const timeDiff = returnDate.getTime() - departureDate.getTime();
        const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)); // calculate difference in days
        document.getElementById("lama").value = daysDiff + 1 + " Hari";;
    }

    document.getElementById("tanggal_berangkat").addEventListener("change", calculateDuration);
    document.getElementById("tanggal_kembali").addEventListener("change", calculateDuration);

    function simpanData() {
        // Mengambil nilai input dari elemen modal
        var noSPT = $("#no_spt").val();
        var noSPPD = $("#no_sppd").val();
        var maksud = $("#maksud").val();
        var transportasi = $("#transportasi").val();
        var tempatBerangkat = $("#tempat_berangkat").val();
        var tempatTujuan = $("#selectTujuan").val();
        var tanggalBerangkat = $("#tanggal_berangkat").val();
        var tanggalKembali = $("#tanggal_kembali").val();
        var lama = $("#lama").val();
        var pengikut = $("#pengikut").val();
        var instansi = $("#instansi").val();
        var mataAnggaran = $("#mata_anggaran").val();
        var keterangan = $("#keterangan").val();
        
        // Mengirim data ke server menggunakan AJAX
        $.ajax({
            url: "perjalanandinas_simpan.php", // Ganti dengan URL endpoint untuk menyimpan data
            type: "POST",
            data: {
                no_spt: noSPT,
                no_sppd: noSPPD,
                maksud: maksud,
                transportasi: transportasi,
                tempat_berangkat: tempatBerangkat,
                tempat_tujuan: tempatTujuan,
                tanggal_berangkat: tanggalBerangkat,
                tanggal_kembali: tanggalKembali,
                lama: lama,
                pengikut: pengikut,
                instansi: instansi,
                mata_anggaran: mataAnggaran,
                keterangan: keterangan
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
                            // Mengatur waktu delay sebelum mengarahkan ke halaman 'perjalanan_dinas.php'
                            setTimeout(() => {
                                resolve();
                            }, 3000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'perjalanan_dinas.php';
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

    
    function deleteRow(id) {
        // Lakukan permintaan AJAX untuk menghapus data pegawai berdasarkan ID
        $.ajax({
            url: 'perjalanandinas_hapus.php', // Ganti dengan URL yang sesuai untuk menghapus data pegawai berdasarkan ID
            type: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                // Menampilkan pesan atau melakukan aksi setelah data berhasil dihapus
                // alert(response);
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response,
                    // showCancelButton: true,
                    confirmButtonText: 'OK',
                    // cancelButtonText: 'Batal',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return new Promise((resolve) => {
                            // Mengatur waktu delay sebelum mengarahkan ke halaman 'pegawai.php'
                            setTimeout(() => {
                                resolve();
                            }, 3000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'perjalanan_dinas.php';
                    }
                });
            },
            error: function(xhr, status, error) {
                // Tindakan yang dilakukan jika terjadi kesalahan dalam permintaan AJAX
                console.error(xhr.responseText);
            }
        });
    }

    function openEditModal(data) {
        // console.log(data[0]); // Menampilkan data ke konsol

        var str = data[0].no_sppd;
        var startIdx = str.indexOf("/") + 1; // Menemukan indeks awal setelah tanda slash pertama
        var endIdx = str.indexOf("/", startIdx); // Menemukan indeks akhir setelah indeks awal
        var angka = str.substring(startIdx, endIdx); // Mengambil substring antara dua indeks
        $('#edit_nosppd').val(angka);
        $('#edit_nospt').val(data[0].no_spt);
        $('#edit_maksud').val(data[0].maksud);
        $('#edit_transportasi').val(data[0].transportasi);
        $('#edit_tempat_berangkat').val(data[0].tempat_berangkat);
        $('#edit_select_tujuan').val(data[0].tempat_tujuan);
        $('#edit_tanggal_berangkat').val(data[0].tanggal_berangkat);
        $('#edit_tanggal_kembali').val(data[0].tanggal_kembali);
        $('#edit_lama').val(data[0].lama);
        $('#edit_pengikut').val(data[0].pengikut);
        $('#edit_instansi').val(data[0].instansi);
        $('#edit_mata_anggaran').val(data[0].mata_anggaran);
        $('#edit_keterangan').val(data[0].keterangan);
        $('#editID').val(data[0].id);

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
                get_data: 'perjalanan_dinas',
                id: id
            },
            success: function(response) {
                // Mengambil objek data pegawai dari respon
                var data = JSON.parse(response);
                console.log(data['data']);
                // Membuka modal edit dan mengisi nilai-nilai data di dalamnya
                openEditModal(data['data']);
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

    function EditData() {
        // Mengambil nilai input dari elemen modal
        var noSPT = $("#edit_nospt").val();
        var noSPPD = $("#edit_nosppd").val();
        var maksud = $("#edit_maksud").val();
        var transportasi = $("#edit_transportasi").val();
        var tempatBerangkat = $("#edit_tempat_berangkat").val();
        var tempatTujuan = $("#edit_select_tujuan").val();
        var tanggalBerangkat = $("#edit_tanggal_berangkat").val();
        var tanggalKembali = $("#edit_tanggal_kembali").val();
        var lama = $("#edit_lama").val();
        var pengikut = $("#edit_pengikut").val();
        var instansi = $("#edit_instansi").val();
        var mataAnggaran = $("#edit_mata_anggaran").val();
        var keterangan = $("#edit_keterangan").val();
        var id = $("#editID").val();
        

        // Mengirim data ke server menggunakan AJAX
        $.ajax({
            url: "perjalanandinas_edit.php", // Ganti dengan URL endpoint untuk menyimpan data
            type: "POST",
            data: {
                no_spt : noSPT,
                no_sppd : noSPPD,
                maksud : maksud,
                transportasi : transportasi,
                tempat_berangkat : tempatBerangkat,
                tempat_tujuan : tempatTujuan,
                tanggal_berangkat : tanggalBerangkat,
                tanggal_kembali : tanggalKembali,
                lama : lama,
                pengikut : pengikut,
                instansi : instansi,
                mata_anggaran : mataAnggaran,
                keterangan : keterangan,
                id :id
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
                            setTimeout(() => {
                                resolve();
                            }, 3000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'perjalanan_dinas.php';
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

    function print(id) {
        console.log(id); // Menampilkan nilai id ke konsol
        var printWindow = window.open();
        fetch('perjalanandinas_print.php?id=' + id)
            .then(response => response.text())
            .then(content => {
                printWindow.document.write('<html><head><title>Cetak</title></head><body>');
                printWindow.document.write(content);
                printWindow.document.write('</body></html>');
                printWindow.print();
                printWindow.close();
            });
    }

    </script>

    <?php include '../template/footer.php'; ?>