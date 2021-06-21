<!-- Begin Page Content -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white-800"><?= $title; ?></h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Agenda Dijadwalkan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dijadwalkan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Agenda Dibatalkan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $dibatalkan ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Agenda Terlaksana </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $terlaksana ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Semua Agenda</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $semua ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Anggota Yang Sering Join</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sering ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Anggota Yang Join Paling Sedikit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($tidaksering as $t) : ?>
                                <?= $t['name']  ?>
                                <br>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <!-- /.container-fluid -->
    <!-- CALENDAR -->
    <div class="row">

        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="elegant-calencar d-md-flex">
                        <div class="wrap-header d-flex align-items-center">
                            <p id="reset">reset</p>
                            <div id="header" class="p-0">
                                <div class="pre-button d-flex align-items-center justify-content-center"><i
                                        class="fa fa-chevron-left"></i></div>
                                <div class="head-info">
                                    <div class="head-day"></div>
                                    <div class="head-month"></div>
                                </div>
                                <div class="next-button d-flex align-items-center justify-content-center"><i
                                        class="fa fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="calendar-wrap table-responsive">
                            <table class="table" id="calendar">
                                <thead>
                                    <tr>
                                        <th>Sun</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thu</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4 col md-5">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>

                </div>
            </div>
        </div>

    </div>
    <!-- END CALENDAR -->
    <!-- Bar Chart -->

</div>

</div>
<!-- End of Main Content -->
<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/popper.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/main.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<!--  -->
<!-- Bootstrap core JavaScript-->
<script>
// Bar Chart Example
$(document).ready(function() {
    $.ajax({
        url: "<?= base_url('admin/getDay'); ?>",
        method: "GET",
        success: function(data) {

            console.log(data);


            let hari = {
                "SENIN": 0,
                "SELASA": 0,
                "RABU": 0,
                "KAMIS": 0,
                "JUMAT": 0,
                "SABTU": 0,
                "MINGGU": 0
            };

            // for (i = d.getDate(); i < day;) {
            //     i++;
            //     console.log(i);
            // }



            data.forEach(element => {


                switch (element) {
                    case 'Monday':

                        hari.SENIN = parseInt(element.jumlah_kegiatan)
                        break;
                    case 'Tuesday':
                        hari.SELASA = parseInt(element.jumlah_kegiatan)
                        break;
                    case 'Wednesday':
                        hari.RABU = parseInt(element.jumlah_kegiatan)
                        break;
                    case 'Thursday':
                        hari.KAMIS = parseInt(element.jumlah_kegiatan)
                        break;
                    case 'Friday':
                        hari.JUMAT = parseInt(element.jumlah_kegiatan)
                        break;
                    case 'Saturday':
                        hari.SABTU = parseInt(element.jumlah_kegiatan)
                        break;
                    case 'Sunday':
                        hari.MINGGU = parseInt(element.jumlah_kegiatan)
                        break;


                }

            });
            console.log(data);
            var ctx = document.getElementById("myBarChart");
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: "Total",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: Object.keys(data),
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'day'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            },
                            maxBarThickness: 25,
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 100,
                                maxTicksLimit: 0,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem
                                    .datasetIndex].label || '';
                                return datasetLabel + ": " + number_format(
                                    tooltipItem
                                    .yLabel);
                            }
                        }
                    },
                }
            });
        }
    })
});
</script>


<!-- Core plugin JavaScript-->


<!-- Custom scripts for all pages-->