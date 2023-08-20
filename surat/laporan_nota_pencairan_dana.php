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
                        <label for="exampleFormControlInput1" class="form-label">No. SPPD</label>
                        <select class="form-select" id="no_npd" name="no_npd" aria-label="Default select example">
                            <option value="">-- Pilih No NPD --</option>
                            <?php
                                        // Query untuk mengambil data dari tabel tb_perintah_tugas
                                        $query = "SELECT no_npd FROM tb_nominatif GROUP BY no_npd";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['no_npd'] . "'>" . $row['no_npd'] . "</option>";
                                        }
                                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sub Kegiatan</label>
                        <select class="form-select" id="sub_kegiatan" name="sub_kegiatan" aria-label="Default select example">
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
                                        $query = "SELECT id_rek,kode_rekening FROM tb_rek_kegiatan";
                                        $result = mysqli_query($conn, $query);

                                        // Iterasi hasil query dan menampilkan nilai kolom "no_spt" dalam elemen select
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['id_rek'] . "'>" . $row['kode_rekening'] . "</option>";
                                        }
                                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pencairan</label>
                        <input type="text" class="form-control" id="pencairan" name="pencairan">
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

    <script>
    $(document).ready(function() {
        var table = $('#data-table').DataTable({
            // "processing": true,
            // "serverSide": true,
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
                        // Ubah format tanggal dari "YYYY-MM-DD" menjadi "senin, 10 januari 2023"
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
                // check if this is the last row
                if (dataIndex === (table.rows().count() - 1)) {
                    $(row).append(
                        '<td><button class="btn btn-primary" onclick="print(\'' + data.id +
                        '\')"><i class="cil-print"></i></button></td>'
                    );
                    // // add Edit button
                    // $(row).append(
                    //     '<td><button class="btn btn-primary"><i class="cil-pencil"></i></button></td>'
                    // );
                    // // add Delete button
                    // $(row).append(
                    //     '<td><button class="btn btn-danger"><i class="cil-trash"></i></button></td>'
                    // );
                }
            }
        });
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
    </script>

    <?php include '../template/footer.php'; ?>