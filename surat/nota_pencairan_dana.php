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
                                        <th>No NPD</th>
                                        <th>Sub Kegiatan</th>
                                        <th>No DPA</th>
                                        <th>Kode Rekening</th>
                                        <th>Uraian</th>
                                        <th>Anggaran</th>
                                        <th>Pencairan</th>
                                        <th>Tanggal</th>
                                        <th>Nama PPTK</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Nota Pencairan Dana</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No. NPD</label>
                        <select class="form-select" id="no_npd" name="no_npd" aria-label="Default select example"
                            onchange="updatePencairan()">
                            <option value="">-- Pilih No NPD --</option>
                            <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT no_npd,nama,uang_harian FROM tb_nominatif GROUP BY no_npd";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['no_npd'] . "' data-uangharian='" . $row['uang_harian'] . "'>" . $row['no_npd'] . " - " . $row['nama'] . "</option>";
                                        }
                                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sub Kegiatan</label>
                        <select class="form-select" id="sub_kegiatan" name="sub_kegiatan"
                            aria-label="Default select example">
                            <option value="">-- Pilih Kegiatan --</option>
                            <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT id,sub_kegiatan FROM tb_pagu";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['sub_kegiatan'] . "</option>";
                                        }
                                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No DPA</label>
                        <input type="text" class="form-control" id="no_dpa" name="no_dpa">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Rekening</label>
                        <select class="form-select" id="kode_rek" name="kode_rek" aria-label="Default select example">
                            <option value="">-- Pilih Kode Rekening --</option>
                            <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT id_rek,kode_rekening, uraian FROM tb_rek_kegiatan";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['id_rek'] . "'>" . $row['kode_rekening'] . " - ". $row['uraian'] ."</option>";
                                        }
                                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pencairan</label>
                        <input type="text" class="form-control" id="pencairan" name="pencairan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal_npd" name="tanggal_npd">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama PPTK</label>
                        <select class="form-select" id="nama_pptk" name="nama_pptk" aria-label="Default select example">
                            <option value="">-- Pilih Nama PPTK --</option>
                            <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT id,nama FROM tb_pegawai";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                        </select>
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
                    <h5 class="modal-title" id="editModalLabel">Edit Data Nota Pencairan Dana</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No. NPD</label>
                        <select class="form-select" id="no_npd_edit" name="no_npd_edit" aria-label="Default select example"
                            onchange="updatePencairanEdit()">
                            <option value="">-- Pilih No NPD --</option>
                            <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT no_npd,nama,uang_harian FROM tb_nominatif GROUP BY no_npd";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['no_npd'] . "' data-uangharian='" . $row['uang_harian'] . "'>" . $row['no_npd'] . " - " . $row['nama'] . "</option>";
                                        }
                                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sub Kegiatan</label>
                        <select class="form-select" id="sub_kegiatan_edit" name="sub_kegiatan_edit"
                            aria-label="Default select example">
                            <option value="">-- Pilih Kegiatan --</option>
                            <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT id,sub_kegiatan FROM tb_pagu";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['sub_kegiatan'] . "</option>";
                                        }
                                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No DPA</label>
                        <input type="text" class="form-control" id="no_dpa_edit" name="no_dpa_edit">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Rekening</label>
                        <select class="form-select" id="kode_rek_edit" name="kode_rek_edit" aria-label="Default select example">
                            <option value="">-- Pilih Kode Rekening --</option>
                            <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT id_rek,kode_rekening, uraian FROM tb_rek_kegiatan";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['id_rek'] . "'>" . $row['kode_rekening'] . " - ". $row['uraian'] ."</option>";
                                        }
                                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pencairan</label>
                        <input type="text" class="form-control" id="pencairan_edit" name="pencairan_edit" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal_npd_edit" name="tanggal_npd_edit">
                        <input type="text" class="form-control" id="id_npd" name="id_npd" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama PPTK</label>
                        <select class="form-select" id="nama_pptk_edit" name="nama_pptk_edit" aria-label="Default select example">
                            <option value="">-- Pilih Nama PPTK --</option>
                            <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT id,nama FROM tb_pegawai";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                        </select>
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
                    "url": "get_data_surat.php?data=npd",
                    "type": "POST"
                },
                "columns": [{
                        "data": ""
                    },
                    {
                        "data": "no_npd"
                    },
                    {
                        "data": "sub_kegiatan"
                    },
                    {
                        "data": "no_dpa"
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
                    },
                    {
                        "data": "pencairan",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "tanggal_npd",
                        "render": function(data, type, row) {
                            var date = new Date(data);
                            var options = {
                                weekday: 'long',
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            };
                            return date.toLocaleDateString('id-ID', options);
                        }
                    },
                    {
                        "data": "nama"
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
                    "url": "get_data_surat.php?data=npd",
                    "type": "POST"
                },
                "columns": [{
                        "data": ""
                    },
                    {
                        "data": "no_npd"
                    },
                    {
                        "data": "sub_kegiatan"
                    },
                    {
                        "data": "no_dpa"
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
                    },
                    {
                        "data": "pencairan",
                        "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                    },
                    {
                        "data": "tanggal_npd",
                        "render": function(data, type, row) {
                            var date = new Date(data);
                            var options = {
                                weekday: 'long',
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            };
                            return date.toLocaleDateString('id-ID', options);
                        }
                    },
                    {
                        "data": "nama"
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
        var nonpd = $('#no_npd').val();
        var subKegiatan = $('#sub_kegiatan').val();
        var nodpa = $('#no_dpa').val();
        var kodeRek = $('#kode_rek').val();
        var pencairan = $('#pencairan').val();
        var tangalNpd = $('#tanggal_npd').val();
        var namaPptk = $('#nama_pptk').val();

        $.ajax({
            url: 'nota_pencairan_dana_simpan.php',
            method: 'POST',
            data: {
                no_npd: nonpd,
                sub_kegiatan: subKegiatan,
                no_dpa: nodpa,
                kode_rek: kodeRek,
                pencairan: pencairan,
                tanggal_npd: tangalNpd,
                nama_pptk: namaPptk,
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
                        window.location.href = 'nota_pencairan_dana.php';
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
        fetch('nota_pencairan_dana_print.php?id=' + id)
            .then(response => response.text())
            .then(content => {
                printWindow.document.write('<html><head><title>Cetak</title></head><body>');
                printWindow.document.write(content);
                printWindow.document.write('</body></html>');
                printWindow.print();
                printWindow.close();
            });
    }

    function deleteRow(id) {
        // Lakukan permintaan AJAX untuk menghapus data pegawai berdasarkan ID
        $.ajax({
            url: 'nota_pencairan_dana_hapus.php', // Ganti dengan URL yang sesuai untuk menghapus data pegawai berdasarkan ID
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
                        window.location.href = 'nota_pencairan_dana.php';
                    }
                });
            },
            error: function(xhr, status, error) {
                // Tindakan yang dilakukan jika terjadi kesalahan dalam permintaan AJAX
                console.error(xhr.responseText);
            }
        });
    }

    function editData() {
        var nonpd = $('#no_npd_edit').val();
        var subKegiatan = $('#sub_kegiatan_edit').val();
        var nodpa = $('#no_dpa_edit').val();
        var kodeRek = $('#kode_rek_edit').val();
        var pencairan = $('#pencairan_edit').val();
        var tanggalNpd = $('#tanggal_npd_edit').val();
        var namaPptk = $('#nama_pptk_edit').val();
        var id_npd = $('#id_npd').val();

        $.ajax({
            url: 'nota_pencairan_dana_edit.php',
            method: 'POST',
            data: {
                no_npd: nonpd,
                sub_kegiatan: subKegiatan,
                no_dpa: nodpa,
                kode_rek: kodeRek,
                pencairan: pencairan,
                tanggal_npd: tanggalNpd,
                nama_pptk: namaPptk,
                id_npd: id_npd
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
                        window.location.href = 'nota_pencairan_dana.php';
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


    function openEditModal(data) {
        $('#no_dpa_edit').val(data[0].no_dpa);
        $('#tanggal_npd_edit').val(data[0].tanggal_npd);
        $('#id_npd').val(data[0].id);
        // Buka modal edit
        $('#editModal').modal('show');
    }

    $(document).on('click', '.edit-button', function() {
        var id = $(this).data('id');
        getDataById(id);
    });


    function getDataById(id) {
        // Lakukan permintaan AJAX untuk mendapatkan data pegawai berdasarkan ID
        $.ajax({
            url: 'get_data_by_id.php', // Ganti dengan URL yang sesuai untuk mengambil data pegawai berdasarkan ID
            type: 'POST',
            data: {
                get_data: 'npd',
                id: id
            },
            success: function(response) {
                // Mengambil objek data pegawai dari respon
                var data = JSON.parse(response);
                // console.log(response);
                // Membuka modal edit dan mengisi nilai-nilai data di dalamnya
                openEditModal(data['data']);
            },
            error: function(xhr, status, error) {
                // Tindakan yang dilakukan jika terjadi kesalahan dalam permintaan AJAX
                console.error(xhr.responseText);
            }
        });
    }

    // Fungsi ini akan dipanggil ketika pilihan dalam select berubah
    function updatePencairanEdit() {
        // Dapatkan elemen select dan input
        var selectElement = document.getElementById("no_npd_edit");
        var pencairanInput = document.getElementById("pencairan_edit");

        // Dapatkan nilai yang dipilih dalam select
        var selectedValue = selectElement.value;

        // Temukan opsi yang dipilih
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        // Dapatkan teks yang berisi nominal dari opsi yang dipilih
        var nominalText = selectedOption.getAttribute("data-uangharian");

        // Set nilai input pencairan dengan nilai nominal
        pencairanInput.value = nominalText;
    }
    </script>

    <?php include '../template/footer.php'; ?>