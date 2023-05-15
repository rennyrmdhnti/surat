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
                        <div class="card-header"><strong>Filter & Input</strong><span class="small ms-1"></div>
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
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Jabatan</th>
                                        <th>Golongan</th>
                                        <th>Bidang</th>
                                        <th>Alamat</th>
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
                            $query = "SELECT nama_pangkat FROM tb_golongan";
                            $result = $conn->query($query);

                            // Loop melalui hasil query dan tampilkan opsi
                            while ($row = $result->fetch_assoc()) {
                                $namaPangkat = $row['nama_pangkat'];
                                echo '<option value="' . $namaPangkat . '">' . $namaPangkat . '</option>';
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
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Pilih Status</option>
                            <option value="1">Menikah</option>
                            <option value="2">Belum Menikah</option>
                        </select>
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
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                        "data": "kd_golongan"
                    },
                    {
                        "data": "bidang"
                    },
                    {
                        "data": "alamat"
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
                            '<td><button class="btn btn-primary"><i class="cil-pencil"></i></button></td>'
                        );
                        // add Delete button
                        $(row).append(
                            '<td><button class="btn btn-danger"><i class="cil-trash"></i></button></td>'
                        );
                    }
                }
            });

            // Menangani klik tombol "Save changes"
            $(".btn-primary").click(function() {
                // Mengambil nilai dari input form
                var nama = $("#nama").val();
                var nip = $("#nip").val();
                var jabatan = $("#jabatan").val();
                var golongan = $("#golonganSelect").val();
                var bidang = $("#bidangSelect").val();
                var alamat = $("#alamat").val();
                var status = $("#statusSelect").val();
                var namaBank = $("#nama_bank").val();
                var kodeRekening = $("#kode_rekening").val();
                var foto = $("#formFile")[0].files[0];

                // Membuat objek FormData untuk mengirim data dengan gambar
                var formData = new FormData();
                formData.append("nama", nama);
                formData.append("nip", nip);
                formData.append("jabatan", jabatan);
                formData.append("golongan", golongan);
                formData.append("bidang", bidang);
                formData.append("alamat", alamat);
                formData.append("status", status);
                formData.append("nama_bank", namaBank);
                formData.append("kode_rekening", kodeRekening);
                formData.append("foto", foto);

                // Mengirim data menggunakan Ajax
                $.ajax({
                    url: "simpan_data_pegawai.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Menampilkan pesan sukses atau error
                        if (response == "success") {
                            Swal.fire(
                                'Success',
                                'Data Berhasil Disimpan',
                                'success'
                            )
                            // Lakukan tindakan lain, seperti memperbarui tabel atau mereset form
                        } else {
                            Swal.fire(
                                'Error',
                                'Gagal Menyimpan data pegawai',
                                'error'
                            )
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        // alert("Terjadi kesalahan dalam menyimpan data pegawai.");
                        Swal.fire(
                            'Error',
                            'Terjadi kesalahan dalam menyimpan data pegawai',
                            'error'
                        )
                    }
                });
            });
        });
    </script>

    <?php include '../template/footer.php'; ?>