<?php include '../template/header.php'; ?>
<?php include '../template/sidebar.php'; ?>

<style>
#data-table_wrapper {
    overflow-x: auto;
}

.zoomable-image {
    transition: transform 0.3s;
}

.zoomable-image:hover {
    transform: scale(1.2);
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
                                        <th>Perihal</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Dasar</th>
                                        <th>Waktu dan Tempat Kegiatan</th>
                                        <th>Hasil Kegiatan</th>
                                        <th>Kesimpulan dan Saran</th>
                                        <th>Foto</th>
                                        <th></th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Hasil Perjalanan Dinas</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Perihal</label>
                            <textarea class="form-control" id="perihal" name="perihal"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Dasar</label>
                            <textarea class="form-control" id="dasar" name="dasar"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Waktu dan Tempat</label>
                        <input type="text" class="form-control" id="waktu_dan_tempat" name="waktu_dan_tempat">
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Hasil Kegiatan</label>
                            <textarea class="form-control" id="hasil_kegiatan" name="hasil_kegiatan"></textarea>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kesimpulan</label>
                            <textarea class="form-control" id="kesimpulan" name="kesimpulan"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kegiatan</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpanData()">Save
                        changes</button>
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
                    <h5 class="modal-title" id="editModalLabel">Input Data Hasil Perjalanan Dinas</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Perihal</label>
                            <textarea class="form-control" id="perihal_edit" name="perihal_edit"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan_edit" name="nama_kegiatan_edit">
                        <input type="text" class="form-control" id="id_hasil" name="id_hasil" hidden>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Dasar</label>
                            <textarea class="form-control" id="dasar_edit" name="dasar_edit"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Waktu dan Tempat</label>
                        <input type="text" class="form-control" id="waktu_dan_tempat_edit" name="waktu_dan_tempat_edit">
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Hasil Kegiatan</label>
                            <textarea class="form-control" id="hasil_kegiatan_edit"
                                name="hasil_kegiatan_edit"></textarea>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kesimpulan</label>
                            <textarea class="form-control" id="kesimpulan_edit" name="kesimpulan_edit"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kegiatan</label>
                        <input class="form-control" type="file" id="formFile_edit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="editData()">Save
                        changes</button>
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
                responsive: true,
                "ajax": {
                    "url": "get_data_surat.php?data=hasil_dinas",
                    "type": "POST"
                },
                "columns": [{
                        "data": ""
                    },
                    {
                        "data": "perihal"
                    },
                    {
                        "data": "nama_kegiatan"
                    },
                    {
                        "data": "dasar"
                    },
                    {
                        "data": "waktu_dan_tempat"
                    },
                    {
                        "data": "hasil_kegiatan"
                    },
                    {
                        "data": "kesimpulan"
                    },
                    {
                        "data": "",
                        "render": function(data, type, row, meta) {
                            return '<img class="zoomable-image" src="' + row.foto +
                                '" alt="Gambar" width="50" height="50" onclick="zoomImage(this)">';
                        }
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
                            '<td><button class="btn btn-danger delete-button" onclick="deleteData(' +
                            data.id + ')"><i class="cil-trash"></i></button></td>'
                        );
                        $(row).append(
                            '<td><button class="btn btn-primary" onclick="print(\'' + data.id +
                            '\')"><i class="cil-print"></i></button></td>'
                        );
                    }
                }
            });
        } else {
            table = $('#data-table').DataTable({
                responsive: true,
                "ajax": {
                    "url": "get_data_surat.php?data=hasil_dinas",
                    "type": "POST"
                },
                "columns": [{
                        "data": ""
                    },
                    {
                        "data": "perihal"
                    },
                    {
                        "data": "nama_kegiatan"
                    },
                    {
                        "data": "dasar"
                    },
                    {
                        "data": "waktu_dan_tempat"
                    },
                    {
                        "data": "hasil_kegiatan"
                    },
                    {
                        "data": "kesimpulan"
                    },
                    {
                        "data": "",
                        "render": function(data, type, row, meta) {
                            return '<img class="zoomable-image" src="' + row.foto +
                                '" alt="Gambar" width="50" height="50" onclick="zoomImage(this)">';
                        }
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

    function zoomImage(imageElement) {
        // Saat gambar diklik, perbesar dengan mengubah gaya transformasi
        imageElement.style.transform = "scale(6.0)";

        // Setelah beberapa waktu, kembalikan ke skala semula
        setTimeout(function() {
            imageElement.style.transform = "scale(1.0)";
        }, 4000); // Ganti 1000 dengan durasi yang diinginkan dalam milidetik
    }

    function simpanData() {
        var perihal = $('#perihal').val();
        var namaKegiatan = $('#nama_kegiatan').val();
        var dasar = $('#dasar').val();
        var waktuDanTempat = $('#waktu_dan_tempat').val();
        var hasilKegiatan = $('#hasil_kegiatan').val();
        var kesimpulan = $('#kesimpulan').val();

        // Mengambil file foto yang diunggah
        var file = document.getElementById('formFile').files[0];
        var formData = new FormData();

        // Menambahkan data ke formData
        formData.append('perihal', perihal);
        formData.append('nama_kegiatan', namaKegiatan);
        formData.append('dasar', dasar);
        formData.append('waktu_dan_tempat', waktuDanTempat);
        formData.append('hasil_kegiatan', hasilKegiatan);
        formData.append('kesimpulan', kesimpulan);
        formData.append('foto', file);

        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'hasil_perjalanan_simpan.php', true);
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
                        window.location.href = 'hasil_perjalanan.php';
                    }
                });

            }
        };
        xhr.send(formData);

    }
    // Fungsi ini akan dipanggil ketika pilihan dalam select berubah
    function updatePencairan() {
        // Dapatkan elemen select dan input
        var selectElement = document.getElementById("no_npd");
        var pencairanInput = document.getElementById("pencairan");

        // Dapatkan nilai yang dipilih dalam select
        var selectedValue = selectElement.value;

        // Temukan opsi yang dipilih
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        // Dapatkan teks yang berisi nominal dari opsi yang dipilih
        var nominalText = selectedOption.getAttribute("data-uangharian");

        // Set nilai input pencairan dengan nilai nominal
        pencairanInput.value = nominalText;
    }

    function print(id) {
        console.log(id); // Menampilkan nilai id ke konsol
        var printWindow = window.open();
        fetch('hasil_perjalanan_print.php?id=' + id)
            .then(response => response.text())
            .then(content => {
                printWindow.document.write('<html><head><title>Cetak</title></head><body>');
                printWindow.document.write(content);
                printWindow.document.write('</body></html>');
                printWindow.print();
                printWindow.close();
            });
    }

    // Mengatur nilai-nilai data dalam modal edit berdasarkan data yang dipilih
    function openEditModal(data) {
        $('#perihal_edit').val(data.perihal);
        $('#dasar_edit').val(data.dasar);
        $('#nama_kegiatan_edit').val(data.nama_kegiatan);
        $('#waktu_dan_tempat_edit').val(data.waktu_dan_tempat);
        $('#hasil_kegiatan_edit').val(data.hasil_kegiatan);
        $('#kesimpulan_edit').val(data.kesimpulan);
        $('#id_hasil').val(data.id);

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
                get_data: 'hasil_dinas',
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
                        url: 'hasil_perjalanan_hapus.php', // Ganti dengan URL yang sesuai untuk menghapus data pegawai berdasarkan ID
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
                            // Mengatur waktu delay sebelum mengarahkan ke halaman 'pegawai.php'
                            setTimeout(() => {
                                resolve();
                            }, 3000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Pengguna mengklik tombol "OK"
                        window.location.href = 'hasil_perjalanan.php';
                    }
                });
            }
        });
    }


    function editData() {
        var perihal = $('#perihal_edit').val();
        var namaKegiatan = $('#nama_kegiatan_edit').val();
        var dasar = $('#dasar_edit').val();
        var waktuDanTempat = $('#waktu_dan_tempat_edit').val();
        var hasilKegiatan = $('#hasil_kegiatan_edit').val();
        var kesimpulan = $('#kesimpulan_edit').val();
        var id = $('#id_hasil').val();

        // Mengambil file foto yang diunggah
        var file = document.getElementById('formFile_edit').files[0];
        var formData = new FormData();

        // Menambahkan data ke formData
        formData.append('perihal', perihal);
        formData.append('nama_kegiatan', namaKegiatan);
        formData.append('dasar', dasar);
        formData.append('waktu_dan_tempat', waktuDanTempat);
        formData.append('hasil_kegiatan', hasilKegiatan);
        formData.append('kesimpulan', kesimpulan);
        formData.append('id', id);
        formData.append('foto', file);

        // Mengirim data ke server menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'hasil_perjalanan_edit.php', true);
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
                        window.location.href = 'hasil_perjalanan.php';
                    }
                });

            }
        };
        xhr.send(formData);
    }
    </script>

    <?php include '../template/footer.php'; ?>