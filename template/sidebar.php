<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <!-- <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg> -->
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="/surat/home.php">
                <svg class="nav-icon">
                    <use xlink:href="/surat/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg> Dashboard</a></li>
        <li class="nav-title">Master</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="/surat/vendors/@coreui/icons/svg/free.svg#cil-notes"></use>
                </svg> Master Data</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="/surat/master/pegawai.php"> Data Pegawai</a></li>
                <li class="nav-item"><a class="nav-link" href="/surat/master/thl.php"> Data THL</a></li>
                <li class="nav-item"><a class="nav-link" href="/surat/master/pagu_kegiatan.php"> Pagu Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="/surat/master/rek_kegiatan.php"> Rek Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="/surat/master/golongan.php"> Golongan</a></li>
                <li class="nav-item"><a class="nav-link" href="/surat/master/uang_harian.php"> Uang Harian</a></li>
                <li class="nav-item"><a class="nav-link" href="/surat/master/biaya_transportasi.php"> Biaya
                        Transportasi</a></li>
                <li class="nav-item"><a class="nav-link" href="/surat/master/biaya_pesawat.php"> Biaya Pesawat</a></li>
                <li class="nav-item"><a class="nav-link" href="/surat/master/biaya_penginapan.php"> Biaya Penginapan</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="/surat/master/rek_travel.php"> Rek Travel</a></li>
            </ul>
        </li>

        <li class="nav-title">Input Surat</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="/surat/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                </svg> Input Data</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="/surat/surat/perintah_tugas.php"> Perintah Tugas</a></li>
                <li class="nav-item"><a class="nav-link" href="/surat/surat/perjalanan_dinas.php"> Perjalanan Dinas</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="/surat/surat/nominatif.php"> Pertanggung Jawaban</a></li>
                <!-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#"> Nominatif</a>
                    <ul class="nav-group-items">
                        <li class="nav-item"><a class="nav-link" href="/surat/surat/nominatif.php"> Pertanggung Jawaban</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link" href="/surat/surat/panjar.php"> Panjar</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link" href="/surat/surat/sisa_pencairan.php">Sisa Pencairan</a></li> -->
                <!-- </ul>
                </li> -->
                <li class="nav-item"><a class="nav-link" href="/surat/surat/nota_pencairan_dana.php"> Nota Pencairan
                        Dana</a></li>
            </ul>
        </li>
        <li class="nav-title">Report</li>
        <!-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="/surat/vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                </svg> Cetak Surat</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="forms/form-control.html"> Data Pegawai</a></li>
                <li class="nav-item"><a class="nav-link" href="forms/select.html"> Data THL</a></li>
                <li class="nav-item"><a class="nav-link" href="forms/checks-radios.html"> Pagu Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="forms/range.html"> Rek Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="forms/input-group.html"> Akses User</a></li>
            </ul>
        </li> -->
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="/surat/vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                </svg> Cetak Laporan</a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" data-coreui-toggle="modal" data-coreui-target="#ModalSPT">Lap Perintah Tugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-coreui-toggle="modal" data-coreui-target="#ModalRPD">Rekap Perjalan Dinas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-coreui-toggle="modal" data-coreui-target="#ModalLPD">Lap Perjalanan Dinas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-coreui-toggle="modal" onclick="cetakDataLRA()">Lap Realisasi Anggaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-coreui-toggle="modal" data-coreui-target="#ModalLaporanKegiatan">Kegiatan Perjalanan Dinas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-coreui-toggle="modal"
                        data-coreui-target="#modalLaporanPerjalananDinas">Lap Peraturan Walikota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-coreui-toggle="modal" data-coreui-target="#ModalLapNota">Lap Nota Pencairan Dana</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-coreui-toggle="modal" data-coreui-target="#ModalSP">Surat Pertanggungjawaban</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-coreui-toggle="modal"
                        data-coreui-target="#ModalLaporanKeberangkatan">Lap Anggaran Perjadin</a>
                </li>
            </ul>
        </li>

    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
<!-- Modal -->
<div class="modal fade" id="ModalSPT" tabindex="-1" aria-labelledby="ModalSPTLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan Surat Perintah Tugas</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDateSPT" class="form-control">
                <br>
                <label for="endDate">End Date</label>
                <input type="date" id="endDateSPT" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="cetakDataSPT()">Cetak Data</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- Modal -->
<div class="modal fade" id="ModalRPD" tabindex="-1" aria-labelledby="ModalRPDLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rekap Perjalanan Dinas</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDateRPD" class="form-control">
                <br>
                <label for="endDate">End Date</label>
                <input type="date" id="endDateRPD" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="cetakDataRPD()">Cetak Data</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- Modal -->
<div class="modal fade" id="ModalLPD" tabindex="-1" aria-labelledby="ModalLPDLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporan Perjalanan Dinas</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDateLPD" class="form-control">
                <br>
                <label for="endDate">End Date</label>
                <input type="date" id="endDateLPD" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="cetakDataLPD()">Cetak Data</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- Modal -->
<div class="modal fade" id="ModalLRA" tabindex="-1" aria-labelledby="ModalLRALabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporan Realisasi Anggaran</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDateLRA" class="form-control">
                <br>
                <label for="endDate">End Date</label>
                <input type="date" id="endDateLRA" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="cetakDataLRA()">Cetak Data</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- Modal -->
<div class="modal fade" id="ModalLapNota" tabindex="-1" aria-labelledby="ModalLapNotaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporan Nota Pencairan Dana</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDateLapNota" class="form-control">
                <br>
                <label for="endDate">End Date</label>
                <input type="date" id="endDateLapNota" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="cetakDataLapNota()">Cetak Data</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- Modal -->
<div class="modal fade" id="ModalSP" tabindex="-1" aria-labelledby="ModalSPLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporan Surat Pertanggung Jawaban</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDateSP" class="form-control">
                <br>
                <label for="endDate">End Date</label>
                <input type="date" id="endDateSP" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="cetakDataSP()">Cetak Data</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- Anda harus menempatkan kode ini di dalam tag <script> di bagian bawah halaman -->
<script>
function cetakDataSPT() {
    var startDate = document.getElementById("startDateSPT").value;
    var endDate = document.getElementById("endDateSPT").value;

    var printWindow = window.open();
    fetch('http://localhost/surat/surat/cetak_laporan_surat_perintah_tugas.php?startDate=' + startDate + '&endDate=' + endDate)
        .then(response => response.text())
        .then(content => {
            printWindow.document.write('<html><head><title>Cetak</title></head><body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.print();
            printWindow.close();
        });
}

function cetakDataRPD() {
    var startDate = document.getElementById("startDateRPD").value;
    var endDate = document.getElementById("endDateRPD").value;

    var printWindow = window.open();
    fetch('http://localhost/surat/surat/cetak_rekap_perjalan_dinas.php?startDate=' + startDate + '&endDate=' + endDate)
        .then(response => response.text())
        .then(content => {
            printWindow.document.write('<html><head><title>Cetak</title></head><body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.print();
            printWindow.close();
        });
}

function cetakDataLPD() {
    var startDate = document.getElementById("startDateLPD").value;
    var endDate = document.getElementById("endDateLPD").value;

    var printWindow = window.open();
    fetch('http://localhost/surat/surat/cetak_laporan_perjalan_dinas.php?startDate=' + startDate + '&endDate=' + endDate)
        .then(response => response.text())
        .then(content => {
            printWindow.document.write('<html><head><title>Cetak</title></head><body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.print();
            printWindow.close();
        });
}

function cetakDataLRA() {
    var startDate = document.getElementById("startDateLRA").value;
    var endDate = document.getElementById("endDateLRA").value;

    var printWindow = window.open();
    fetch('http://localhost/surat/surat/cetak_laporan_realisasi_anggaran.php?startDate=' + startDate + '&endDate=' + endDate)
        .then(response => response.text())
        .then(content => {
            printWindow.document.write('<html><head><title>Cetak</title></head><body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.print();
            printWindow.close();
        });
}

function cetakDataLapNota() {
    var startDate = document.getElementById("startDateLapNota").value;
    var endDate = document.getElementById("endDateLapNota").value;

    var printWindow = window.open();
    fetch('http://localhost/surat/surat/cetak_laporan_pencairan_dana.php?startDate=' + startDate + '&endDate=' + endDate)
        .then(response => response.text())
        .then(content => {
            printWindow.document.write('<html><head><title>Cetak</title></head><body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.print();
            printWindow.close();
        });
}

function cetakDataSP() {
    var startDate = document.getElementById("startDateSP").value;
    var endDate = document.getElementById("endDateSP").value;

    var printWindow = window.open();
    fetch('http://localhost/surat/surat/cetak_laporan_pertanggungjawaban.php?startDate=' + startDate + '&endDate=' + endDate)
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