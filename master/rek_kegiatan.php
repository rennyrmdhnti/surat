<?php include '../template/header.php'; ?>
<?php include '../template/sidebar.php'; ?>

<style>
#data-table tbody {
    font-size: 14px;
    /* ukuran font yang diinginkan */
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
                            <table id="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sub Kegiatan</th>
                                        <th>Kode Rekening</th>
                                        <th>Uraian</th>
                                        <th>Anggaran</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Rekening Kegiatan</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="sub_kegiatan" class="form-label">Sub Kegiatan</label>
                        <select class="form-select" id="sub_kegiatan" name="sub_kegiatan">
                            <option selected>Pilih Sub Kegiatan</option>
                            <?php
                            // Ambil data dari tabel tb_golongan
                            $query = "SELECT * FROM tb_pagu";
                            $result = $conn->query($query);

                            // Loop melalui hasil query dan tampilkan opsi
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $sub_kegiatan = $row['sub_kegiatan'];

                                echo '<option value="' . $id . '">' . $sub_kegiatan . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Rekening</label>
                        <input type="text" class="form-control" id="kode_rekening" name="kode_rekening">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Uraian</label>
                        <input type="text" class="form-control" id="uraian" name="uraian">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Anggaran</label>
                        <input type="text" class="form-control" id="anggaran" name="anggaran">
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
                    <h5 class="modal-title" id="editModalLabel">Input Data Rekening Kegiatan</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="sub_kegiatan" class="form-label">Sub Kegiatan</label>
                        <select class="form-select" id="edit_sub_kegiatan" name="edit_sub_kegiatan">
                            <option selected>Pilih Sub Kegiatan</option>
                            <?php
                            // Ambil data dari tabel tb_golongan
                            $query = "SELECT * FROM tb_pagu";
                            $result = $conn->query($query);

                            // Loop melalui hasil query dan tampilkan opsi
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $sub_kegiatan = $row['sub_kegiatan'];

                                echo '<option value="' . $id . '">' . $sub_kegiatan . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Rekening</label>
                        <input type="text" class="form-control" id="edit_kode_kegiatan" name="edit_kode_kegiatan">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Uraian</label>
                        <input type="text" class="form-control" id="edit_uraian" name="edit_uraian">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Anggaran</label>
                        <input type="text" class="form-control" id="edit_anggaran" name="edit_anggaran">
                        <input type="text" class="form-control" id="id_rek" name="id_rek" hidden>
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
        var table;

        if (<?php echo $status_login ?> === 0) {
            table = $('#data-table').DataTable({
                "ajax": {
                    "url": "get_data_master.php?data=rek_kegiatan",
                    "type": "POST"
                },
                "columns": [{
                        "data": ""
                    },
                    {
                        "data": "sub_kegiatan"
                    },
                    {
                        "data": "kode_rekening"
                    },
                    {
                        "data": "uraian"
                    },
                    {
                        "data": "anggaran",
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
                            .id_rek +
                            '"><i class="cil-pencil"></i></button></td>'
                        );

                        $(row).append(
                            '<td><button class="btn btn-danger delete-button" onclick="deleteData(' +
                            data.id_rek + ')"><i class="cil-trash"></i></button></td>'
                        );
                    }
                }
            });
        } else {
            table = $('#data-table').DataTable({
                "ajax": {
                    "url": "get_data_master.php?data=rek_kegiatan",
                    "type": "POST"
                },
                "columns": [{
                        "data": ""
                    },
                    {
                        "data": "sub_kegiatan"
                    },
                    {
                        "data": "kode_rekening"
                    },
                    {
                        "data": "uraian"
                    },
                    {
                        "data": "anggaran",
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
    // Fungsi untuk menyimpan data pegawai ke dalam database
    function simpanData() {
        // Mengambil nilai input dari form
        var sub_kegiatan = document.getElementById('sub_kegiatan').value;
        var kode_rekening = document.getElementById('kode_rekening').value;
        var uraian = document.getElementById('uraian').value;
        var anggaran = document.getElementById('anggaran').value;

        var formData = new FormData();
        // Menambahkan data ke formData
        formData.append('sub_kegiatan', sub_kegiatan);
        formData.append('kode_rekening', kode_rekening);
        formData.append('uraian', uraian);
        formData.append('anggaran', anggaran);


        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'rek_kegiatan_simpan.php', true);
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
                        window.location.href = 'rek_kegiatan.php';
                    }
                });

            }
        };
        xhr.send(formData);
    }

    // Mengatur nilai-nilai data dalam modal edit berdasarkan data yang dipilih
    function openEditModal(data) {
        $('#edit_sub_kegiatan').val(data.id_sub);
        $('#edit_kode_kegiatan').val(data.kode_rekening);
        $('#edit_uraian').val(data.uraian);
        $('#edit_anggaran').val(data.anggaran);
        $('#id_rek').val(data.id_rek);


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
                get_data: 'rek_kegiatan',
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
                    // Lakukan permintaan AJAX untuk menghapus data pegawai berdasarkan ID
                    $.ajax({
                        url: 'rek_kegiatan_hapus.php', // Ganti dengan URL yang sesuai untuk menghapus data pegawai berdasarkan ID
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
                            // Mengatur waktu delay sebelum mengarahkan ke halaman 'rek_kegiatan.php'
                            setTimeout(() => {
                                resolve();
                            }, 3000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'rek_kegiatan.php';
                    }
                });
            }
        });
    }

    function updateData() {
        // Mengambil nilai input dari form
        var sub_kegiatan = document.getElementById('edit_sub_kegiatan').value;
        var kode_rekening = document.getElementById('edit_kode_kegiatan').value;
        var uraian = document.getElementById('edit_uraian').value;
        var anggaran = document.getElementById('edit_anggaran').value;
        var id_rek = document.getElementById('id_rek').value;

        var formData = new FormData();

        // Menambahkan data ke formData
        formData.append('sub_kegiatan', sub_kegiatan);
        formData.append('kode_rekening', kode_rekening);
        formData.append('uraian', uraian);
        formData.append('anggaran', anggaran);
        formData.append('id_rek', id_rek);

        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'rek_kegiatan_edit.php', true);
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
                        window.location.href = 'rek_kegiatan.php';
                    }
                });
            }
        };
        xhr.send(formData);
    }
    </script>

    <?php include '../template/footer.php'; ?>