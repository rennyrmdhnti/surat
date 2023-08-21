<?php include 'template/header.php'; ?>
<?php include 'template/sidebar.php'; ?>

<?php 
require_once 'config/koneksi.php';

$sql = "SELECT COUNT(*) as total FROM tb_pegawai";


    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }


    $sqlTHL = "SELECT COUNT(*) as total FROM tb_thl";


    $resultTHL = $conn->query($sqlTHL);
    $dataTHL = array();
    while ($rowTHL = $resultTHL->fetch_assoc()) {
        $dataTHL[] = $rowTHL;
    }


    $sqlSurat = "SELECT
    (SELECT COUNT(*) FROM tb_pencairan_dana) AS total_tb_pencairan_dana,
    (SELECT COUNT(*) FROM tb_perintah_tugas) AS total_tb_perintah_tugas,
    (SELECT COUNT(*) FROM tb_perjalan_dinas) AS total_tb_perjalan_dinas,
    (SELECT COUNT(*) FROM tb_nominatif) AS total_tb_nominatif;
";


    $resultSurat = $conn->query($sqlSurat);
    $dataSurat = array();
    while ($rowSurat = $resultSurat->fetch_assoc()) {
        $dataSurat[] = $rowSurat;
    }



?>


<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
        <?php include 'template/headbar.php'; ?>
        <div class="header-divider"></div>
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        <!-- if breadcrumb is single--><span>Home</span>
                    </li>
                    <li class="breadcrumb-item active"><span>Dashboard</span></li>
                </ol>
            </nav>
        </div>
    </header>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card mb-4 text-white bg-primary">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold"><?php echo $data[0]['total'] ?><span
                                        class="fs-6 fw-normal"></span></div>
                                <div>Pegawai</div>
                            </div>
                            <!-- <div class="dropdown">
                                <button class="btn btn-transparent text-white p-0" type="button"
                                    data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                        href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                        class="dropdown-item" href="#">Something else here</a></div>
                            </div> -->
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart1" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-4">
                    <div class="card mb-4 text-white bg-info">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold"><?php echo $dataTHL[0]['total'] ?><span class="fs-6 fw-normal"></span></div>
                                <div>THL</div>
                            </div>
                            <!-- <div class="dropdown">
                                <button class="btn btn-transparent text-white p-0" type="button"
                                    data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                        href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                        class="dropdown-item" href="#">Something else here</a></div>
                            </div> -->
                        </div>
                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart2" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-4">
                    <div class="card mb-4 text-white bg-warning">
                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold"><?php echo $dataSurat[0]['total_tb_pencairan_dana'] + $dataSurat[0]['total_tb_perintah_tugas'] + $dataSurat[0]['total_tb_perjalan_dinas'] + $dataSurat[0]['total_tb_nominatif']?><span class="fs-6 fw-normal"></span></div>
                                <div>Surat</div>
                            </div>
                            <!-- <div class="dropdown">
                                <button class="btn btn-transparent text-white p-0" type="button"
                                    data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                        href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                        class="dropdown-item" href="#">Something else here</a></div>
                            </div> -->
                        </div>
                        <div class="c-chart-wrapper mt-3" style="height:70px;">
                            <canvas class="chart" id="card-chart3" height="70"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'template/footer.php'; ?>