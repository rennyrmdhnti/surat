<?php include '../template/header.php'; ?>
<?php include '../template/sidebar.php'; ?>


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
                            <table id="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Provinsi</th>
                                        <th>Satuan</th>
                                        <th>Ketegori 1</th>
                                        <th>Ketegori 2</th>
                                        <th>Ketegori 3</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Biaya Penginapan</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="propinsi" class="form-label">Provinsi</label>
                        <select class="form-select" id="propinsi" name="propinsi">
                            <option>Pilih Provinsi</option>
                            <?php
                            // Ambil data dari tabel tb_golongan
                            $query = "SELECT * FROM tb_propinsi";
                            $result = $conn->query($query);

                            // Loop melalui hasil query dan tampilkan opsi
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $nama = $row['nama'];

                                echo '<option value="' . $id . '">' . $nama . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kategori 1</label>
                        <input type="text" class="form-control" id="kategori1" name="kategori1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kategori 2</label>
                        <input type="text" class="form-control" id="kategori2" name="kategori2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kategori 3</label>
                        <input type="text" class="form-control" id="kategori3" name="kategori3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpanData()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Input Data Biaya Penginapan</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="propinsi" class="form-label">Provinsi</label>
                        <select class="form-select" id="edit_propinsi" name="edit_propinsi">
                            <option>Pilih Provinsi</option>
                            <?php
                            // Ambil data dari tabel tb_golongan
                            $query = "SELECT * FROM tb_propinsi";
                            $result = $conn->query($query);

                            // Loop melalui hasil query dan tampilkan opsi
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $nama = $row['nama'];

                                echo '<option value="' . $id . '">' . $nama . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Satuan</label>
                        <input type="text" class="form-control" id="edit_satuan" name="edit_satuan">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kategori 1</label>
                        <input type="text" class="form-control" id="edit_kategori1" name="edit_kategori1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kategori 2</label>
                        <input type="text" class="form-control" id="edit_kategori2" name="edit_kategori2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kategori 3</label>
                        <input type="text" class="form-control" id="edit_kategori3" name="edit_kategori3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateData()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <script>
    $(document).ready(function() {
        var table = $('#data-table').DataTable({
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": "get_data_master.php?data=penginapan",
                "type": "POST"
            },
            "columns": [{
                    "data": ""
                },
                {
                    "data": "nama"
                },
                {
                    "data": "satuan"
                },
                {
                    "data": "kategori1",
                    "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                },
                {
                    "data": "kategori2",
                    "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                },
                {
                    "data": "kategori3",
                    "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
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
    });
  // Fungsi untuk menyimpan data pegawai ke dalam database
  function simpanData() {
        // Mengambil nilai input dari form
        var propinsi = document.getElementById('propinsi').value;
        var satuan = document.getElementById('satuan').value;
        var kategori1 = document.getElementById('kategori1').value;
        var kategori2 = document.getElementById('kategori2').value;
        var kategori3 = document.getElementById('kategori3').value;

        var formData = new FormData();
        // Menambahkan data ke formData
        formData.append('propinsi', propinsi);
        formData.append('satuan', satuan);
        formData.append('kategori1', kategori1);
        formData.append('kategori2', kategori2);
        formData.append('kategori3', kategori3);

        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'biaya_penginapan_simpan.php', true);
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
                            }, 6000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'biaya_penginapan.php';
                    }
                });

            }
        };
        xhr.send(formData);
    }

    // Mengatur nilai-nilai data dalam modal edit berdasarkan data yang dipilih
    function openEditModal(data) {
        $('#edit_propinsi').val(data.propinsi);
        $('#edit_satuan').val(data.satuan);
        $('#edit_kategori1').val(data.kategori1);
        $('#edit_kategori2').val(data.kategori2);
        $('#edit_kategori3').val(data.kategori3);
        $('#id_penginapan').val(data.id);

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
                get_data: 'biaya_penginapan',
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
            url: 'biaya_penginapan_hapus.php', // Ganti dengan URL yang sesuai untuk menghapus data pegawai berdasarkan ID
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
                        window.location.href = 'biaya_penginapan.php';
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
        var propinsi = document.getElementById('edit_propinsi').value;
        var satuan = document.getElementById('edit_satuan').value;
        var kategori1 = document.getElementById('edit_kategori1').value;
        var kategori2 = document.getElementById('edit_kategori2').value;
        var kategori3 = document.getElementById('edit_kategori3').value;
        var id_penginapan = document.getElementById('id_penginapan').value;

        var formData = new FormData();

        // Menambahkan data ke formData
        formData.append('propinsi', propinsi);
        formData.append('satuan', satuan);
        formData.append('kategori1', kategori1);
        formData.append('kategori2', kategori2);
        formData.append('kategori3', kategori3);
        formData.append('id_penginapan', id_penginapan);

        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'biaya_penginapan_edit.php', true);
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
                            }, 6000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'biaya_penginapan.php';
                    }
                });
            }
        };
        xhr.send(formData);
    }
    </script>

    <?php include '../template/footer.php'; ?>