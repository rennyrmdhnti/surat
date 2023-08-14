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
                            '<td><button class="btn btn-primary"><i class="cil-pencil"></i></button></td>'
                        );
                        $(row).append(
                            '<td><button class="btn btn-danger"><i class="cil-trash"></i></button></td>'
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
        var perihal = $('#perihal').val();
        var namaKegiatan = $('#nama_kegiatan').val();
        var dasar = $('#dasar').val();
        var waktuDanTempat = $('#waktu_dan_tempat').val();
        var hasilKegiatan = $('#hasil_kegiatan').val();
        var kesimpulan = $('#kesimpulan').val();

        $.ajax({
            url: 'hasil_perjalanan_simpan.php',
            method: 'POST',
            data: {
                perihal: perihal,
                nama_kegiatan: namaKegiatan,
                dasar: dasar,
                waktu_dan_tempat: waktuDanTempat,
                hasil_kegiatan: hasilKegiatan,
                kesimpulan: kesimpulan
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
                        window.location.href = 'hasil_perjalanan.php';
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
    </script>

    <?php include '../template/footer.php'; ?>