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
                                        <th>No SPT</th>
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
                                    <label for="exampleFormControlInput1" class="form-label">Pilih Perbidang</label>
                                    <select class="form-select" id="selectPegawai" aria-label="Default select example">
                                        <option selected disabled>Bidang</option>
                                        <option value="1">Kepala Badan</option>
                                        <option value="2">Sekretariat</option>
                                        <option value="3">PBMD</option>
                                        <option value="4">Pajak</option>
                                        <option value="5">Hanwas</option>
                                        <option value="6">Anggaran</option>
                                        <option value="7">Akuntansi</option>
                                        <option value="8">Perbendaharaan</option>
                                        <option value="9">UPT</option>
                                    </select>
                                    <div class="scrollable" id="scrollPegawai"
                                        style="max-height: 250px; overflow-y: auto; padding:5px"></div>
                                </div>
                            </div>
                            <div class="col col-lg-8">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">No SPT</label>
                                    <input type="text" class="form-control" id="no_spt" name="no_spt">
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

    const data1 = [];
    fetch('get_data_surat.php?data=1')
        .then(response => {
            if (!response.ok) {
                throw new Error('Response not OK');
            }
            return response.json();
        })
        .then(data => {
            data1.push(...data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    const data2 = [];
    fetch('get_data_surat.php?data=2')
        .then(response => {
            if (!response.ok) {
                throw new Error('Response not OK');
            }
            return response.json();
        })
        .then(data => {
            data2.push(...data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    const data3 = [];
    fetch('get_data_surat.php?data=3')
        .then(response => {
            if (!response.ok) {
                throw new Error('Response not OK');
            }
            return response.json();
        })
        .then(data => {
            data3.push(...data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    const data4 = [];
    fetch('get_data_surat.php?data=4')
        .then(response => {
            if (!response.ok) {
                throw new Error('Response not OK');
            }
            return response.json();
        })
        .then(data => {
            data4.push(...data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    const data5 = [];
    fetch('get_data_surat.php?data=5')
        .then(response => {
            if (!response.ok) {
                throw new Error('Response not OK');
            }
            return response.json();
        })
        .then(data => {
            data5.push(...data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    const data6 = [];
    fetch('get_data_surat.php?data=6')
        .then(response => {
            if (!response.ok) {
                throw new Error('Response not OK');
            }
            return response.json();
        })
        .then(data => {
            data6.push(...data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    const data7 = [];
    fetch('get_data_surat.php?data=7')
        .then(response => {
            if (!response.ok) {
                throw new Error('Response not OK');
            }
            return response.json();
        })
        .then(data => {
            data7.push(...data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    const data8 = [];
    fetch('get_data_surat.php?data=8')
        .then(response => {
            if (!response.ok) {
                throw new Error('Response not OK');
            }
            return response.json();
        })
        .then(data => {
            data8.push(...data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    const data9 = [];
    fetch('get_data_surat.php?data=9')
        .then(response => {
            if (!response.ok) {
                throw new Error('Response not OK');
            }
            return response.json();
        })
        .then(data => {
            data9.push(...data);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    const selectPegawai = document.getElementById("selectPegawai");
    const scrollPegawai = document.getElementById("scrollPegawai");

    selectPegawai.addEventListener("change", function() {
        // hapus semua item di dalam scrollPegawai
        scrollPegawai.innerHTML = "";

        // ambil nilai dari elemen select
        const value = selectPegawai.value;

        // tentukan data yang akan ditampilkan di scrollPegawai
        let dataToShow = [];
        if (value === "1") {
            dataToShow = data1[0];
        } else if (value === "2") {
            dataToShow = data2[0];
        } else if (value === "3") {
            dataToShow = data3[0];
        } else if (value === "4") {
            dataToShow = data4[0];
        } else if (value === "5") {
            dataToShow = data5[0];
        } else if (value === "6") {
            dataToShow = data6[0];
        } else if (value === "7") {
            dataToShow = data7[0];
        } else if (value === "8") {
            dataToShow = data8[0];
        } else if (value === "9") {
            dataToShow = data9[0];
        }


        // tampilkan data di dalam scrollPegawai
        dataToShow.forEach(function(data) {
            const item = document.createElement("div");

            // buat checkbox untuk setiap item data
            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "pegawai";
            checkbox.value = data.id;
            item.appendChild(checkbox);

            // buat label untuk checkbox
            const label = document.createElement("label");
            label.htmlFor = "pegawai-" + data.id;
            label.textContent = data.nama + " - " + data.bidang;
            item.appendChild(label);

            scrollPegawai.appendChild(item);
        });
    });

    // tambahkan event listener untuk checkbox di dalam scrollPegawai
    scrollPegawai.addEventListener("change", function(event) {
        const checkboxes = scrollPegawai.querySelectorAll("input[type=checkbox]");
        const checkedValues = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                checkedValues.push(checkbox.value);
            }
        });
        console.log("Checkbox values:", checkedValues);
    });
    </script>

    <?php include '../template/footer.php'; ?>