


@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/notif.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Document</title>
</head>
<body id="body">
<br>
<?php $no = 1;$kandang =1;
            $s = [];
            $s[0] = "Aktif";
            $s[1] = "Nonaktif";
            $noo = 1;
?>
<!-- Content -->

<div class="row">

    <div class="col-lg-9">
        <!-- <DashboardMonitoringIndex> -->
        <div class="card card-margin " id="halaman_awal">
            <div class="row ">
                <!--kandang -->
                <div class="col-lg-6 collg back">
                    <div class="btn btn-warning garis-btn"></div>
                    <center>
                            <i class="fas fa-archive logo-kandang"></i><br>
                            <label id="d_kandang">kandang : {{$rows[0]->name}}</label><br>
                            <label id="entry"></label>
                    </center>
                </div>

                <!-- Suhu -->
                <div class="col-lg-2 collg"  >
                    <center>
                            <label class="textup">Suhu</label><br>
                            <i class="fas fa-temperature-low logo-dashboard"></i><br>
                            <label id="d_suhu"></label><br>
                            <button class="btn btn-dark txt" id="btn_suhu">Lihat Grafik</button>
                    </center>
                </div>
                <!-- Kelembapan -->
                <div class="col-lg-2 collg"  >
                    <center>
                            <label class="textup">Kelembapan</label><br>
                            <i class="fas fa-tint logo-dashboard"></i><br>
                            <label id="d_kelembapan"></label><br>
                            <button class="btn btn-dark txt" id="btn_kelembapan">Lihat Grafik</button>
                    </center>
                </div>

                <!-- Berat -->
                <div class="col-lg-2 collg"  >
                    <center>
                            <label class="textup">Berat</label><br>
                            <i class="fas fa-balance-scale logo-dashboard"></i><br>
                            <label id="d_berat"></label><br>
                            <button class="btn btn-dark txt" id="btn_berat">Lihat Grafik</button>
                    </center>
                </div>

            </div>
        </div>
        <!-- <DashboardMonitoringIndex> -->

        <!-- <ChartMonitoringIndex> -->
            <div class="card card-margin" id="halaman_suhu" style="display: none">

                <!-- SUHU -->
                <div class="row ">
                    <!-- Suhu index -->
                    <div class="col-lg-4 collg-Chart" >
                        <i class="fas fa-chevron-right logo-panah"></i>
                        <div class="btn btn-warning garis-btns" id="suhu_back">
                            <i class="fas fa-chevron-left"> Kembali</i>
                        </div>
                        <button value="refresh" class="btn btn-warning" style="border-radius:50%;right:20px;top:10px;position:absolute" onclick="refresh()">
                            <i class=" fas fa-sync"></i>
                        </button>
                        <center>
                            <label class="textup-chart">Suhu</label><br>
                            <i class="fas fa-temperature-low logo-chart"></i><br>
                            <label id="suhu"></label><br>
                        </center>
                    </div>
                    <!-- Suhu Chart -->
                    <div class="col-lg-8">
                        <div class="chartWrappers" id="suhu_chart">
                            <canvas id="suhu-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-margin" id="halaman_kelembapan" style="display: none">
                <!-- KELEMBAPAN -->
                <div class="row ">
                    <!-- Kelembapan index -->
                    <div class="col-lg-4 collg-Chart" >
                        <i class="fas fa-chevron-right logo-panah"></i>
                        <div class="btn btn-warning garis-btns" id="kelembapan_back">
                            <i class="fas fa-chevron-left"> Kembali</i>
                        </div>
                        <button value="refresh" class="btn btn-warning" style="border-radius:50%;right:20px;top:10px;position:absolute" onclick="refresh()">
                            <i class=" fas fa-sync"></i>
                        </button>
                        <center>
                            <label class="textup-chart">Kelembapan</label><br>
                            <i class="fas fa-tint logo-chart"></i><br>
                            <label id="kelembapan"></label><br>
                        </center>
                    </div>
                    <!-- Kelembapan Chart -->
                    <div class="col-lg-8">
                        <div class="chartWrappers" id="kelembapan_chart">
                            <canvas id="kelembapan-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-margin" id="halaman_berat" style="display: none">
                <!-- BERAT -->
                <div class="row ">
                    <!-- Berat index -->
                    <div class="col-lg-4 collg-Chart" >
                        <i class="fas fa-chevron-right logo-panah"></i>
                        <div class="btn btn-warning garis-btns" id="berat_back">
                            <i class="fas fa-chevron-left"> Kembali</i>
                        </div>
                        <button value="refresh" class="btn btn-warning" style="border-radius:50%;right:20px;top:10px;position:absolute" onclick="refresh()">
                            <i class=" fas fa-sync"></i>
                        </button>
                        <center>
                            <label class="textup-chart">Berat</label><br>
                            <i class="fas fa-balance-scale logo-chart"></i><br>
                            <label id="berats"></label><br>
                        </center>
                    </div>
                    <!-- Berat Chart -->
                    <div class="col-lg-8">
                        <div class="chartWrappers" id="berat_chart">
                            <canvas id="berat-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </ChartMonitoringIndex> -->
    </div>

<!-- Catatan -->
<div class="col-lg-3" id="catatans">
        <div class="card" style="height:420px">
        <i class="fas fa-file-alt ii"></i>
            <!-- Start -->
            <div class="card-body pt-0"><br>
                <div class="widget-49">
                    <div class="widget-49-title-wrapper">
                        <div class="widget-49-date-primary">
                        <span class="widget-49-date-day" style="font-size:10px">Tanggal</span>
                            <span class="widget-49-date-day" id="day"></span>

                        </div>
                        <div class="widget-49-meeting-info">
                            <span class="widget-49-pro-title">Beeshet</span>
                            <span class="widget-49-date-monthyear" id="my"></span>
                            <span class="widget-49-meeting-time"id="time"></span>
                        </div>
                    </div><br>
                    <!-- CATATAN -->
                    <!-- Tambah Catatan -->
                    <div class="row">
                        <button class="btn btn-warning b" id="tambah" style="border-radius:50%;">
                            <i class="fas fa-plus bp" ></i>
                        </button><br>
                        <label class="tambah-text">Tambah Catatan</label>
                    </div>
                    <ol class="widget-49-meeting-points card-body table-responsive">
                        <form action="{{ route('home.store') }}" method="POST" id="meet" style="margin-top:-50px">
                            @csrf
                            <!-- Tambah Catatan ex -->
                            <div class="form-group">
                                <input class="form-control" style="display:none" type="text" name="text" id="tambah2"/>
                            </div>
                            <div class="form-group">
                            <button class="btn btn-warning " id="t1" style="display:none">Simpan</button>
                            <a class="btn btn-danger" id="t2" style="display:none">Batal</a>
                            </div>
                        </form>
                        <br>
                        <!-- Delete Catatan -->
                            @foreach($note as $n)
                        <form method="POST" action="{{ route('home.destroy', $n) }}" >
                            @csrf
                            @method('DELETE')
                            <div class="widget-49-meeting-item" >
                            <li>
                            <label style="color:grey">&nbsp;{{$n->created_at->Format('d/m | H:i:s')}}</label>
                            <button class="fa fa-times delete-catatan"></button><br>
                            <span class="widget-49-meeting-item2">{{$n->text}}</span>
                            </li><br>
                            </div>
                        </form>
                            @endforeach
                    </ol>
            </div>
            <!-- end part -->
        </div>
    </div>
</div>
</div><br><br>

<!-- Tabel Data -->
<div class="row" id="status">
    <div class="col-lg-5" >
        <!-- Data Kandang -->
        <div class="card card-margin" style="max-height:300px;height:350px;">
            <div class="card-header" style="background:rgba(108, 122, 137, 1)">
            <i class="fab fa-hive iii " style="color:white"></i>
        </div>
            <div class="card-body p-0 table-responsive" >
            <table class="table table-bordered table-striped table-hover mb-0" style="text-align:center;font-family: cursive;">
            <thead>
                <tr>
                    <th width="1px">No</th>
                    <th>Kandang</th>
                    <th>Status</th>
                    <th>User</th>
                </tr>
            </thead>
            <!-- kandang 1 -->
            <tr>
                <td>#{{ $no++ }}</td>
                <td>Kandang{{$noo++}}</td>
                <th class="text-success">{{$s[0]}}</th>
                <td id="user">{{$rows[0]->name}}</td>
            </tr>
            <!-- kandang 2 -->
            <tr>
                <td>#{{ $no++ }}</td>
                <td>Kandang{{$noo++}}</td>
                <th class="text-danger">{{$s[1]}}</th>
                <td id="user"></td>
            </tr>
            <!-- kandang 2 -->
            <tr>
                <td>#{{ $no++ }}</td>
                <td>Kandang{{$noo++}}</td>
                <th class="text-danger">{{$s[1]}}</th>
                <td id="user"></td>
            </tr>
            <!-- kandang 2 -->
            <tr>
                <td>#{{ $no++ }}</td>
                <td>Kandang{{$noo++}}</td>
                <th class="text-danger">{{$s[1]}}</th>
                <td id="user"></td>
            </tr>
            <!-- kandang 2 -->
            <tr>
                <td>#{{ $no++ }}</td>
                <td>Kandang{{$noo++}}</td>
                <th class="text-danger">{{$s[1]}}</th>
                <td id="user"></td>
            </tr>
        </table>
        </div>
        </div>
        <!-- Data User -->
            <!-- List User -->
        <div class="row">
        <div class="card card-margin cc">
            <center><div class="card-body" style="height:80px;padding-top:20px;background:rgba(108, 122, 137, 1);">
            <i class="fas fa-users iii"></i>
            <div class="garis" style="border:2px solid orange"></div><br>
            </div></center>
            <div class="card-body p-0 table-responsive no-border">
            <table class="table no-border table-hover " style="text-align:center">
            <thead>
                <tr>
                    <th width="1px">No</th>
                    <th>Nama User</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            <?php $nos = 1 ?>
                @foreach($rows as $row)
                <tr>
                <td style="width:10px;">{{ $no++ }}</td>
                <td style="flex-direction: column">
                <span style="display">{{ $row->name }}</span>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
            <!-- Card User -->
        <div class="card card-margin cc2">
            <center><div class="card-body p-0 table-responsive">
                <i class="far fa-user userpoint" ></i><br><br>
                <h5 class="card-users">{{ $row->count() }}</h5>
                <label class="card-users">Total User</label>
            </div></center>
        </div>
        </div>
    </div>
    <!-- Chart -->
    <div class="col-lg-7" style="max-height:95%"  id="chart-">
        <div class="card card-margin" style="height:95%;">
            <div class="d-flex justify-content-center" style="margin-top:10px;">
                <button class="btn button-chart" id="linebtn" style="background: rgba(240, 173, 78, 0.5);">Line
                </button>
                <div style="visibility: hidden">daw</div>
                <button class="btn button-chart" id="barbtn">Bar
                </button>
            </div>
            <button value="refresh" class="btn btn-warning" style="border-radius:50%;right:40px;top:60px;position:absolute" onclick="refresh()">
                <i class=" fas fa-sync"></i>
            </button>
            <center><div class="garis"></div></center>
            <div class="chartWrapper" id="lines">
                <canvas id="line"></canvas>
            </div>
            <div class="chartWrapper2" id="bars"style="display: none">
                <canvas id="bar"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- floating notif -->
@foreach($rows as $row) @endforeach
<?php $angka = 1 ?>
<div class="popup act-btn3 fa fa-bell" style="padding : 10px" onclick="myFunction()">
<div class="box-notif" id="box-notif"><label class="pentung">!</label></div>
  <i class="popupbox " id="myPopup">
    <div class="notify"><i class="fas fa-bars"></i><label class="notify-txt">Notification</label>
        <div class="body-notification"><div class="line"></div>

            <div class="card-body table-responsive">

            <!-- Jika tidak ada kandang yang memenuhi -->
            <div class="no">Tidak Ada Notifikasi&nbsp;<i class="far fa-bell-slash"></i></div>
            <!-- Jika Berat Memenuhi -->
                <!-- User 1 -->
                <div class="yes">
                    <div class="post">
                        <div class="circle"></div>
                        <span class="time" id="waktu"></span><br>
                            <p><b>Kandang : Kandang{{$angka++}} <br></p>
                            <p id="berat"></p>
                    </div>
                </div>
                <!-- User 2 -->

            </div>
        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script src="{{ asset('js/notif.js') }}"></script>
<script src="{{ asset('js/thingspeak.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/map.js') }}"></script>
</html>
@endsection
