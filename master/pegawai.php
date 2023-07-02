<?php include '../template/header.php'; ?>
<?php include '../template/sidebar.php'; ?>

<style>
#data-table_wrapper {
    overflow-x: auto;
}

td {
    /* font-size: 10px; */
    max-width: 240px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
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
                            <button type="button" class="btn btn-primary" id="print-button" >
                                Cetak Data
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
                            <table id="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Jabatan</th>
                                        <th>Golongan</th>
                                        <th>Bidang</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Nama Bank</th>
                                        <th>Kode Rekening</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Pegawai</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Golongan</label>
                        <select class="form-select" aria-label="Default select example" id="golonganSelect">
                            <option selected>Pilih golongan</option>
                            <?php
                            // Ambil data dari tabel tb_golongan
                            $query = "SELECT id_gol, nama_pangkat,kd_golongan FROM tb_golongan";
                            $result = $conn->query($query);

                            // Loop melalui hasil query dan tampilkan opsi
                            while ($row = $result->fetch_assoc()) {
                                $idGol = $row['id_gol'];
                                $namaPangkat = $row['nama_pangkat'];
                                $kodeGolongan = $row['kd_golongan'];
                                echo '<option value="' . $idGol . '">' . $namaPangkat . ' - ' . $kodeGolongan . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Bidang</label>
                        <select class="form-select" aria-label="Default select example" id="bidangSelect">
                            <option selected>Pilih bidang</option>
                            <?php
                                // Ambil data dari tabel tb_bidang
                                $query = "SELECT bidang FROM tb_bidang";
                                $result = $conn->query($query);

                                // Loop melalui hasil query dan tampilkan opsi
                                while ($row = $result->fetch_assoc()) {
                                    $bidang = $row['bidang'];
                                    echo '<option value="' . $bidang . '">' . $bidang . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" id="statusSelect">
                            <option selected>Pilih Status</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Bank</label>
                        <input type="text" class="form-control" id="nama_bank" name="nama_bank">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Rekening</label>
                        <input type="text" class="form-control" id="kode_rekening" name="kode_rekening">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="formFile">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Pegawai</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editNama" name="editNama">
                    </div>
                    <div class="mb-3">
                        <label for="editNIP" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="editNIP" name="editNIP" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editJabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="editJabatan" name="editJabatan">
                    </div>
                    <div class="mb-3">
                        <label for="editGolongan" class="form-label">Golongan</label>
                        <select class="form-select" id="editGolongan" name="editGolongan">
                            <option selected>Pilih golongan</option>
                            <?php
                            // Ambil data dari tabel tb_golongan
                            $query = "SELECT id_gol, nama_pangkat,kd_golongan FROM tb_golongan";
                            $result = $conn->query($query);

                            // Loop melalui hasil query dan tampilkan opsi
                            while ($row = $result->fetch_assoc()) {
                                $idGol = $row['id_gol'];
                                $namaPangkat = $row['nama_pangkat'];
                                $kodeGolongan = $row['kd_golongan'];
                                echo '<option value="' . $idGol . '">' . $namaPangkat . ' - ' . $kodeGolongan . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editBidang" class="form-label">Bidang</label>
                        <select class="form-select" id="editBidang" name="editBidang">
                            <option selected>Pilih bidang</option>
                            <?php
                            // Ambil data dari tabel tb_bidang
                            $query = "SELECT bidang FROM tb_bidang";
                            $result = $conn->query($query);

                            // Loop melalui hasil query dan tampilkan opsi
                            while ($row = $result->fetch_assoc()) {
                                $bidang = $row['bidang'];
                                echo '<option value="' . $bidang . '">' . $bidang . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editAlamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="editAlamat" name="editAlamat" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-select" id="editStatus" name="editStatus">
                            <option selected>Pilih Status</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="editEmail" name="editEmail">
                    </div>
                    <div class="mb-3">
                        <label for="editNamaBank" class="form-label">Nama Bank</label>
                        <input type="text" class="form-control" id="editNamaBank" name="editNamaBank">
                    </div>
                    <div class="mb-3">
                        <label for="editKodeRekening" class="form-label">Kode Rekening</label>
                        <input type="text" class="form-control" id="editKodeRekening" name="editKodeRekening">
                    </div>
                    <div class="mb-3">
                        <label for="editFoto" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="editFoto" name="editFoto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateData()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        var table = $('#data-table').DataTable({
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": "get_data_master.php?data=pegawai",
                "type": "POST"
            },
            "columns": [{
                    "data": ""
                },
                {
                    "data": "",
                    "render": function(data, type, row, meta) {
                        // Mengembalikan elemen gambar HTML dengan sumber gambar sesuai data
                        return '<img src="' + row.foto +
                            '" alt="Gambar" width="50" height="50">';
                    }
                },
                {
                    "data": "nama"
                },
                {
                    "data": "nip"
                },
                {
                    "data": "jabatan"
                },
                {
                    "data": null,
                    "render": function(data, type, row, meta) {
                        return row.nama_pangkat + " - " + row.kd_golongan;
                    }
                },
                {
                    "data": "bidang"
                },
                {
                    "data": "alamat"
                },
                {
                    "data": "email"
                },
                {
                    "data": "status"
                },
                {
                    "data": "nama_bank"
                },
                {
                    "data": "kode_rekening"
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
                if (dataIndex === (table.rows().count() - 1)) {
                    // add Edit button
                    $(row).append(
                        '<td><button class="btn btn-primary edit-button" data-id="' + data.id +
                        '"><i class="cil-pencil"></i></button></td>'
                    );

                    // add Delete button
                    $(row).append(
                        '<td><button class="btn btn-danger delete-button" onclick="deleteData(' +
                        data.id + ')"><i class="cil-trash"></i></button></td>'
                    );
                }
            }
        });

        $("#data-table").on("mouseenter", "td", function() {
            $(this).attr('title', this.innerText);
        });

        $('#print-button').on('click', function() {
            // Mendapatkan data dari DataTable yang telah difilter
            var filteredData = table.rows({
                filter: 'applied'
            }).data();

            // Mengambil data NIP dari baris yang telah difilter
            var nips = filteredData.toArray().map(function(row) {
                return row.nip;
            });

            // Mengirim data NIP ke pegawai_cetak.php menggunakan AJAX
            $.ajax({
                url: 'pegawai_cetak.php',
                method: 'POST',
                data: {
                    nips: nips
                },
                success: function(response) {
                    // Menampilkan response dari pegawai_cetak.php di jendela baru
                    var newWindow = window.open('', '_blank');
                    newWindow.document.open();
                    newWindow.document.write(response);
                    newWindow.document.close();

                    // Melakukan pencetakan
                    newWindow.print();
                },
                error: function(xhr, status, error) {
                    // Penanganan kesalahan jika terjadi kesalahan dalam permintaan AJAX
                    console.error(error);
                }
            });
        });

    });



    // Fungsi untuk menyimpan data pegawai ke dalam database
    function simpanData() {
        // Mengambil nilai input dari form
        var nama = document.getElementById('nama').value;
        var nip = document.getElementById('nip').value;
        var jabatan = document.getElementById('jabatan').value;
        var golongan = document.getElementById('golonganSelect').value;
        var bidang = document.getElementById('bidangSelect').value;
        var alamat = document.getElementById('alamat').value;
        var status = document.getElementById('statusSelect').value;
        var email = document.getElementById('email').value;
        var namaBank = document.getElementById('nama_bank').value;
        var kodeRekening = document.getElementById('kode_rekening').value;

        // Mengambil file foto yang diunggah
        var file = document.getElementById('formFile').files[0];
        var formData = new FormData();

        // Menambahkan data ke formData
        formData.append('nama', nama);
        formData.append('nip', nip);
        formData.append('jabatan', jabatan);
        formData.append('golongan', golongan);
        formData.append('bidang', bidang);
        formData.append('alamat', alamat);
        formData.append('status', status);
        formData.append('email', email);
        formData.append('nama_bank', namaBank);
        formData.append('kode_rekening', kodeRekening);
        formData.append('foto', file);

        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'pegawai_simpan.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Menampilkan pesan atau melakukan aksi setelah data berhasil disimpan
                // alert(xhr.responseText);
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: xhr.responseText,
                    // showCancelButton: true,
                    confirmButtonText: 'OK',
                    // cancelButtonText: 'Batal',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return new Promise((resolve) => {
                            // Mengatur waktu delay sebelum mengarahkan ke halaman 'pegawai.php'
                            setTimeout(() => {
                                resolve();
                            }, 9000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'pegawai.php';
                    }
                });

            }
        };
        xhr.send(formData);
    }

    // Mengatur nilai-nilai data dalam modal edit berdasarkan data yang dipilih
    function openEditModal(data) {
        $('#editNama').val(data.nama);
        $('#editNIP').val(data.nip);
        $('#editJabatan').val(data.jabatan);
        $('#editGolongan').val(data.id_gol);
        $('#editBidang').val(data.bidang);
        $('#editAlamat').val(data.alamat);
        $('#editStatus').val(data.status);
        $('#editEmail').val(data.email);
        $('#editNamaBank').val(data.nama_bank);
        $('#editKodeRekening').val(data.kode_rekening);

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
                get_data: 'pegawai',
                id: id
            },
            success: function(response) {
                // Mengambil objek data pegawai dari respon
                var data = JSON.parse(response);
                // console.log();
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

    // Menghapus data pegawai berdasarkan ID
    function deleteData(id) {
        // Lakukan permintaan AJAX untuk menghapus data pegawai berdasarkan ID
        $.ajax({
            url: 'pegawai_hapus.php', // Ganti dengan URL yang sesuai untuk menghapus data pegawai berdasarkan ID
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
                        window.location.href = 'pegawai.php';
                    }
                });
            },
            error: function(xhr, status, error) {
                // Tindakan yang dilakukan jika terjadi kesalahan dalam permintaan AJAX
                console.error(xhr.responseText);
            }
        });
    }

    function updateData() {
        // Mengambil nilai input dari form
        var nama = document.getElementById('editNama').value;
        var nip = document.getElementById('editNIP').value;
        var jabatan = document.getElementById('editJabatan').value;
        var golongan = document.getElementById('editGolongan').value;
        var bidang = document.getElementById('editBidang').value;
        var alamat = document.getElementById('editAlamat').value;
        var status = document.getElementById('editStatus').value;
        var email = document.getElementById('editEmail').value;
        var namaBank = document.getElementById('editNamaBank').value;
        var kodeRekening = document.getElementById('editKodeRekening').value;

        // Mengambil file foto yang diunggah
        var file = document.getElementById('editFoto').files[0];
        var formData = new FormData();

        // Menambahkan data ke formData
        formData.append('nama', nama);
        formData.append('nip', nip);
        formData.append('jabatan', jabatan);
        formData.append('golongan', golongan);
        formData.append('bidang', bidang);
        formData.append('alamat', alamat);
        formData.append('status', status);
        formData.append('email', email);
        formData.append('nama_bank', namaBank);
        formData.append('kode_rekening', kodeRekening);
        formData.append('foto', file);

        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'pegawai_edit.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Menampilkan pesan atau melakukan aksi setelah data berhasil diperbarui
                // alert(xhr.responseText);
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: xhr.responseText,
                    // showCancelButton: true,
                    confirmButtonText: 'OK',
                    // cancelButtonText: 'Batal',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return new Promise((resolve) => {
                            // Mengatur waktu delay sebelum mengarahkan kembali ke halaman 'pegawai.php'
                            setTimeout(() => {
                                resolve();
                            }, 9000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'pegawai.php';
                    }
                });
            }
        };
        xhr.send(formData);
    }
    </script>

    <?php include '../template/footer.php'; ?>