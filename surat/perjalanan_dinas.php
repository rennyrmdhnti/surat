<?php include '../template/header.php'; ?>
<?php include '../template/sidebar.php'; ?>

<style>
.dataTables_scrollHead {
    display: none;
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
                        <div class="card-header"><strong>Filter & Input</strong><span class="small ms-1"></div>
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
                            <table id="data-table" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No SPT</th>
                                        <th>No SPPD</th>
                                        <th>Maksud Perjadi</th>
                                        <th>Alat Transportasi</th>
                                        <th>Tempat Berangkat</th>
                                        <th>Tempat Tujuan</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Lama</th>
                                        <th>Pengikut</th>
                                        <th>Instansi</th>
                                        <th>Mata Anggaran</th>
                                        <th>Keterangan</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Input Surat Perjalanan Dinas</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No. SPT</label>
                                <select class="form-select" id="selectPegawai" aria-label="Default select example">
                                    <option selected disabled>Pilih No SPT</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No. SPPD</label>
                                <input type="text" class="form-control" id="no_spt" name="no_spt">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Maksud Perjadin</label>
                                <textarea class="form-control" id="dasar" name="dasar" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alat Transportasi</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Transportasi</option>
                                    <option value="1">Pesawat atau Transportasi Lain yang Menunjang</option>
                                    <option value="2">Mobil atau Transportasi Lain yang Menunjang</option>
                                    <option value="3">Kereta Api atau Transportasi Lain yang Menunjang</option>
                                    <option value="4">Kapal atau Transportasi Lain yang Menunjang</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tempat Berangkat</label>
                                <input type="text" class="form-control" id="no_spt" name="no_spt">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tempat Tujuan</label>
                                <input type="text" class="form-control" id="no_spt" name="no_spt">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Berangkat</label>
                                <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Kembali</label>
                                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Lama</label>
                                <input type="text" class="form-control" id="lama" name="lama" readonly>
                            </div>

                        </div>
                        <div class="col" style="margin-top: 87px !important;">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Pengikut</label>
                                <input type="text" class="form-control" id="no_spt" name="no_spt">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Instansi</label>
                                <textarea class="form-control" id="dasar" name="dasar" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Mata Anggaran</label>
                                <textarea class="form-control" id="dasar" name="dasar" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="no_spt" name="no_spt">
                            </div>
                        </div>
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

            "scrollX": true,
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
    });

    function calculateDuration() {
        const departureDate = new Date(document.getElementById("tanggal_berangkat").value);
        const returnDate = new Date(document.getElementById("tanggal_kembali").value);
        const timeDiff = returnDate.getTime() - departureDate.getTime();
        const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)); // calculate difference in days
        document.getElementById("lama").value = daysDiff + 1 + " Hari";;
    }

    document.getElementById("tanggal_berangkat").addEventListener("change", calculateDuration);
    document.getElementById("tanggal_kembali").addEventListener("change", calculateDuration);
    </script>

    <?php include '../template/footer.php'; ?>