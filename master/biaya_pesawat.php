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
                            <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#exampleModal">
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
                                        <th>Nama Kota</th>
                                        <!-- <th>Bisnis</th> -->
                                        <th>Ekonomi</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Biaya Pesawat</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Kota</label>
                        <input type="text" class="form-control" id="nama_kota" name="nama_kota">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Bisnis</label>
                        <input type="text" class="form-control" id="bisnis" name="bisnis">
                    </div> -->
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ekonomi</label>
                        <input type="text" class="form-control" id="ekonomi" name="ekonomi">
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

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Biaya Pesawat</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Kota</label>
                        <input type="text" class="form-control" id="id_pesawat" name="id_pesawat" hidden>
                        <input type="text" class="form-control" id="nama_kota_edit" name="nama_kota_edit">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Bisnis</label>
                        <input type="text" class="form-control" id="bisnis" name="bisnis">
                    </div> -->
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ekonomi</label>
                        <input type="text" class="form-control" id="ekonomi_edit" name="ekonomi_edit">
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
            var table;

            if (<?php echo $status_login ?> === 0) {
                table = $('#data-table').DataTable({
                    "ajax": {
                        "url": "get_data_master.php?data=pesawat",
                        "type": "POST"
                    },
                    "columns": [{
                            "data": ""
                        },
                        {
                            "data": "kota"
                        },
                        // { "data": "bisnis" },
                        {
                            "data": "ekonomi",
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
                        if (dataIndex === (table.rows().count() - 1)) {
                            $(row).append(
                                '<td><button class="btn btn-primary edit-button" data-id="' + data
                                .id_pesawat +
                                '"><i class="cil-pencil"></i></button></td>'
                            );
                            $(row).append(
                                '<td><button class="btn btn-danger delete-button" onclick="deleteData(' +
                                data.id_pesawat + ')"><i class="cil-trash"></i></button></td>'
                            );
                        }
                    }
                });
            } else {
                table = $('#data-table').DataTable({
                    "ajax": {
                        "url": "get_data_master.php?data=pesawat",
                        "type": "POST"
                    },
                    "columns": [{
                            "data": ""
                        },
                        {
                            "data": "kota"
                        },
                        // { "data": "bisnis" },
                        {
                            "data": "ekonomi",
                            "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
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

        function simpanData() {
            // Mengambil nilai input dari form
            var nama_kota = document.getElementById('nama_kota').value;
            var ekonomi = document.getElementById('ekonomi').value;

            var formData = new FormData();
            // Menambahkan data ke formData
            formData.append('nama_kota', nama_kota);
            formData.append('ekonomi', ekonomi);

            // Mengirim data ke server menggunakan AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'biaya_pesawat_simpan.php', true);
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
                                setTimeout(() => {
                                    resolve();
                                }, 6000);
                            });
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Pengguna mengklik tombol "OK"
                            window.location.href = 'biaya_pesawat.php';
                        }
                    });

                }
            };
            xhr.send(formData);
        }

        // Mengatur nilai-nilai data dalam modal edit berdasarkan data yang dipilih
        function openEditModal(data) {
            $('#nama_kota_edit').val(data.kota);
            $('#ekonomi_edit').val(data.ekonomi);
            $('#id_pesawat').val(data.id_pesawat);

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
                    get_data: 'biaya_pesawat',
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
            // Show a confirmation popup before proceeding with deletion
            Swal.fire({
                icon: 'warning',
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return new Promise((resolve) => {
                        // Lakukan permintaan AJAX untuk menghapus data biaya penginapan berdasarkan ID
                        $.ajax({
                            url: 'biaya_pesawat_hapus.php', // Ganti dengan URL yang sesuai untuk menghapus data biaya penginapan berdasarkan ID
                            type: 'POST',
                            data: {
                                id: id
                            },
                            success: function(response) {
                                // Menampilkan pesan atau melakukan aksi setelah data berhasil dihapus
                                resolve(response);
                            },
                            error: function(xhr, status, error) {
                                // Tindakan yang dilakukan jika terjadi kesalahan dalam permintaan AJAX
                                console.error(xhr.responseText);
                                resolve('Terjadi kesalahan saat menghapus data.');
                            }
                        });
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Pengguna mengklik tombol "Ya"
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: result.value,
                        confirmButtonText: 'OK',
                        showLoaderOnConfirm: true,
                        preConfirm: () => {
                            return new Promise((resolve) => {
                                // Mengatur waktu delay sebelum mengarahkan ke halaman 'biaya_pesawat.php'
                                setTimeout(() => {
                                    resolve();
                                }, 3000);
                            });
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Pengguna mengklik tombol "OK"
                            window.location.href = 'biaya_pesawat.php';
                        }
                    });
                }
            });
        }


        function updateData() {
            // Mengambil nilai input dari form
            var nama_kota = document.getElementById('nama_kota_edit').value;
            var ekonomi = document.getElementById('ekonomi_edit').value;
            var id = document.getElementById('id_pesawat').value;

            var formData = new FormData();

            // Menambahkan data ke formData
            formData.append('nama_kota', nama_kota);
            formData.append('ekonomi', ekonomi);
            formData.append('id', id);

            // Mengirim data ke server menggunakan AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'biaya_pesawat_edit.php', true);
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
                            window.location.href = 'biaya_pesawat.php';
                        }
                    });
                }
            };
            xhr.send(formData);
        }
    </script>

    <?php include '../template/footer.php'; ?>