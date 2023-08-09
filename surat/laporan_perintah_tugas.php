<?php include '../template/header.php'; ?>
<?php include '../template/sidebar.php'; ?>

<style>
#data-table_wrapper {
    overflow-x: auto;
}

/* td { */
/* max-width: 80px; */
/* overflow: hidden; */
/* text-overflow: ellipsis; */
/* white-space: nowrap; */
/* } */
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
    <!-- <div class="body px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Input</strong><span class="small ms-1"></div>
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
    </div> -->
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
                                        <th style='width: 3%;'>No</th>
                                        <th style='width: 20%;'>No SPT</th>
                                        <th>Nama</th>
                                        <th>Dasar</th>
                                        <th>Untuk</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Input Surat Perintah Tugas</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pilih Pegawai</label><input
                                        type="text" id="pegawai" class="form-control" placeholder="Pilih pegawai"
                                        data-toggle="popover">
                                </div>
                            </div>
                            <div class="col col-lg-8">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">No SPT</label>
                                    <input type="text" class="form-control" id="no_spt" name="no_spt">
                                    <small>Harap masukkan angka dari 001 hingga 999.</small>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Dasar</label>
                                    <textarea class="form-control" id="dasar" name="dasar" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Untuk</label>
                                    <textarea class="form-control" id="untuk" name="untuk" rows="3"></textarea>
                                </div>
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
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-4">
                                <div class="mb-3">
                                    <label for="pegawai" class="form-label">Pilih Pegawai</label>
                                    <input type="text" id="editPegawai" class="form-control" placeholder="Pilih pegawai"
                                        data-toggle="popover">
                                </div>
                            </div>
                            <div class="col col-lg-8">
                                <div class="mb-3">
                                    <label for="no_spt" class="form-label">No SPT</label>
                                    <input type="text" class="form-control" id="editNoSPT" name="editNoSPT">
                                    <small>Harap masukkan angka dari 001 hingga 999.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="dasar" class="form-label">Dasar</label>
                                    <textarea class="form-control" id="editDasar" name="editDasar" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="untuk" class="form-label">Untuk</label>
                                    <textarea class="form-control" id="editUntuk" name="editUntuk" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" id="editID" name="editID" rows="3"></textarea>
                                </div>
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


    <link rel="stylesheet" href="../jquery.inputpicker.css">
    <script src="../jquery.inputpicker.js"></script>


    <script>
    var inputNoSPT = document.getElementById("no_spt");
    inputNoSPT.addEventListener("input", function() {
        var value = this.value;
        var formattedValue = value.replace(/\D/g, ''); // Menghapus karakter non-angka

        if (formattedValue.length > 3) {
            formattedValue = formattedValue.substr(0, 3); // Mengambil tiga digit pertama
        }

        if (formattedValue !== value) {
            this.value = formattedValue; // Mengupdate nilai input dengan nilai yang telah diformat
        }
    });

    function print(id) {
        console.log(id); // Menampilkan nilai id ke konsol
        var printWindow = window.open();
        fetch('perintahtugas_print.php?id=' + id)
            .then(response => response.text())
            .then(content => {
                printWindow.document.write('<html><head><title>Cetak</title></head><body>');
                printWindow.document.write(content);
                printWindow.document.write('</body></html>');
                printWindow.print();
                printWindow.close();
            });
    }

    function openEditModal(data) {
        // console.log(data[0]); // Menampilkan data ke konsol

        var id = [data[0].id, data[1].id, data[2].id];
        // console.log(id); // Menampilkan nilai id ke konsol

        var str = data[0].no_spt;
        var startIdx = str.indexOf("/") + 1; // Menemukan indeks awal setelah tanda slash pertama
        var endIdx = str.indexOf("/", startIdx); // Menemukan indeks akhir setelah indeks awal
        var angka = str.substring(startIdx, endIdx); // Mengambil substring antara dua indeks
        $('#editDasar').val(data[0].dasar);
        $('#editNoSPT').val(angka);
        $('#editUntuk').val(data[0].untuk);
        $('#editID').val(id);

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
                get_data: 'surat_perintah',
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

    // $('#pegawai').on('change', function() {
    //     var selectedData = $('#pegawai').inputpicker('getSelection');
    //     console.log(selectedData);
    // });

    // $('#editPegawai').on('change', function() {
    //     var selectedData = $('#editPegawai').inputpicker('getSelection');
    //     console.log(selectedData);
    // });

    $(document).ready(function() {

        $("#editID").hide();

        var table = $('#data-table').DataTable({
            // "processing": true,
            // "serverSide": true,
            "scrollX": true,
            responsive: true,
            "ajax": {
                "url": "get_data_surat.php?data=spt",
                "type": "POST"
            },
            "columns": [{
                    "data": ""
                },
                {
                    "data": "no_spt"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "dasar"
                },
                {
                    "data": "untuk"
                }
            ],
            "columnDefs": [{
                    "width": "10px",
                    "targets": [0]
                }, // Mengubah lebar kolom pertama menjadi 200px
                {
                    "width": "300px",
                    "targets": [1]
                }, // Mengubah lebar kolom kedua menjadi 150px
                {
                    "width": "280px",
                    "targets": [2]
                },
                {
                    "width": "600px",
                    "targets": [3]
                },
                {
                    "width": "600px",
                    "targets": [4]
                },
                {
                    "targets": 0,
                    "data": null,
                    "render": function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                }
            ],
            "createdRow": function(row, data, dataIndex) {
                // check if this is the last row
                var no_spt = data.no_spt.replace(/\//g, '').replace('Sekr/BPKPAD', '');

                if (dataIndex === (table.rows().count() - 1)) {
                    // add Edit button
                    $(row).append(
                        '<td><button class="btn btn-primary" onclick="print(\'' + data.id +
                        '\')"><i class="cil-print"></i></button></td>'
                    );
                    // add Edit button
                    // $(row).append(
                    //     '<td><button class="btn btn-primary edit-button" data-id="' + no_spt +
                    //     '"><i class="cil-pencil"></i></button></td>'
                    // );
                    // // add Delete button
                    // $(row).append(
                    //     '<td><button class="btn btn-danger" onclick="deleteRow(\'' + no_spt +
                    //     '\')"><i class="cil-trash"></i></button></td>'
                    // );


                }
            }

        });

        $("#data-table").on("mouseenter", "td", function() {
            $(this).attr('title', this.innerText);
        });

        table.on('draw', function() {
            adjustRowHeight();
        });

        $(window).on('resize', function() {
            adjustRowHeight();
        });

        // Fungsi untuk mengatur tinggi baris
        function adjustRowHeight() {
            $('.datatable td').each(function() {
                var $cell = $(this);
                var cellHeight = $cell[0].scrollHeight;
                $cell.css('max-height', cellHeight);
            });
        }

        $.ajax({
            url: 'get_data_pegawai.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#pegawai').inputpicker({
                    data: response,
                    fields: ['value', 'nama', 'bidang'],
                    fieldText: 'nama',
                    multiple: true,
                    headShow: true,
                    filterOpen: true,
                    autoOpen: true
                });
            },
            error: function() {
                // Tindakan jika terjadi kesalahan
            }
        });

        $.ajax({
            url: 'get_data_pegawai.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#editPegawai').inputpicker({
                    data: response,
                    fields: ['value', 'nama', 'bidang'],
                    fieldText: 'nama',
                    multiple: true,
                    headShow: true,
                    filterOpen: true,
                    autoOpen: true
                });
            },
            error: function() {
                // Tindakan jika terjadi kesalahan
            }
        });


    });

    function deleteRow(id) {
        // Lakukan permintaan AJAX untuk menghapus data pegawai berdasarkan ID
        $.ajax({
            url: 'perintahtugas_hapus.php', // Ganti dengan URL yang sesuai untuk menghapus data pegawai berdasarkan ID
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
                        window.location.href = 'perintah_tugas.php';
                    }
                });
            },
            error: function(xhr, status, error) {
                // Tindakan yang dilakukan jika terjadi kesalahan dalam permintaan AJAX
                console.error(xhr.responseText);
            }
        });
    }


    function simpanData() {
        // Mengambil nilai input dari elemen modal
        var nama = $("#pegawai").val();
        var noSPT = $("#no_spt").val();
        var dasar = $("#dasar").val();
        var untuk = $("#untuk").val();

        // Lakukan validasi atau manipulasi data sebelum mengirimkan ke server

        // Mengirim data ke server menggunakan AJAX
        $.ajax({
            url: "perintahtugas_simpan.php", // Ganti dengan URL endpoint untuk menyimpan data
            type: "POST",
            data: {
                nama: nama,
                no_spt: noSPT,
                dasar: dasar,
                untuk: untuk
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
                        window.location.href = 'perintah_tugas.php';
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

    function EditData() {
        // Mengambil nilai input dari elemen modal
        var nama = $("#editPegawai").val();
        var noSPT = $("#editNoSPT").val();
        var dasar = $("#editDasar").val();
        var untuk = $("#editUntuk").val();
        var id = $("#editID").val();

        // console.log(nama);
        // console.log(noSPT);
        // console.log(dasar);
        // console.log(untuk);
        // console.log(id);

        // Lakukan validasi atau manipulasi data sebelum mengirimkan ke server

        // Mengirim data ke server menggunakan AJAX
        $.ajax({
            url: "perintahtugas_edit.php", // Ganti dengan URL endpoint untuk menyimpan data
            type: "POST",
            data: {
                nama: nama,
                no_spt: noSPT,
                dasar: dasar,
                untuk: untuk,
                id: id
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
                        window.location.href = 'perintah_tugas.php';
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
    </script>

    <?php include '../template/footer.php'; ?>