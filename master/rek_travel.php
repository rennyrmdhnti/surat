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
                                        <th>Nama Travel</th>
                                        <th>No Rekening</th>
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
                        <label for="exampleFormControlInput1" class="form-label">Nama Travel</label>
                        <input type="text" class="form-control" id="nama_travel" name="nama_travel">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Rekening</label>
                        <input type="text" class="form-control" id="no_rek" name="no_rek">
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
                    <h5 class="modal-title" id="editModalLabel">Input Data Biaya Pesawat</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Travel</label>
                        <input type="text" class="form-control" id="edit_nama_travel" name="edit_nama_travel">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Rekening</label>
                        <input type="text" class="form-control" id="edit_no_rek" name="edit_no_rek">
                        <input type="text" class="form-control" id="id_travel" name="id_travel" hidden>
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
                "url": "get_data_master.php?data=rek_travel",
                "type": "POST"
            },
            "columns": [{
                    "data": ""
                },
                {
                    "data": "nama"
                },
                {
                    "data": "norek"
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
        var nama_travel = document.getElementById('nama_travel').value;
        var no_rek = document.getElementById('no_rek').value;

        var formData = new FormData();
        // Menambahkan data ke formData
        formData.append('nama_travel', nama_travel);
        formData.append('no_rek', no_rek);

        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'rek_travel_simpan.php', true);
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
                        window.location.href = 'rek_travel.php';
                    }
                });

            }
        };
        xhr.send(formData);
    }

    // Mengatur nilai-nilai data dalam modal edit berdasarkan data yang dipilih
    function openEditModal(data) {
        $('#edit_nama_travel').val(data.nama);
        $('#edit_no_rek').val(data.norek);
        $('#id_travel').val(data.id);

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
                get_data: 'travel',
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
                // Lakukan permintaan AJAX untuk menghapus data rekening travel berdasarkan ID
                $.ajax({
                    url: 'rek_travel_hapus.php', // Ganti dengan URL yang sesuai untuk menghapus data rekening travel berdasarkan ID
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        // Menampilkan pesan atau melakukan aksi setelah data berhasil dihapus
                        resolve(response);
                    },
                    error: function (xhr, status, error) {
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
                        // Mengatur waktu delay sebelum mengarahkan ke halaman 'rek_travel.php'
                        setTimeout(() => {
                            resolve();
                        }, 3000);
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Pengguna mengklik tombol "OK"
                    window.location.href = 'rek_travel.php';
                }
            });
        }
    });
}


    function updateData() {
        // Mengambil nilai input dari form
        var nama_travel = document.getElementById('edit_nama_travel').value;
        var no_rek = document.getElementById('edit_no_rek').value;
        var id_travel = document.getElementById('id_travel').value;

        var formData = new FormData();

        // Menambahkan data ke formData
        formData.append('nama', nama_travel);
        formData.append('norek', no_rek);
        formData.append('id', id_travel);
        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'rek_travel_edit.php', true);
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
                        window.location.href = 'rek_travel.php';
                    }
                });
            }
        };
        xhr.send(formData);
    }
    </script>

    <?php include '../template/footer.php'; ?>