<link href="{{ asset('css/notif.css') }}" rel="stylesheet">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@extends('adminlte::page')
@section('title', 'Profile')
@section('content_header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<!-- Image -->
<img src="https://i.postimg.cc/HkYYYJY3/Untitled.png" style="width:102%;margin-left:-16px;margin-top:-15px;">
<!-- Admin Content -->
<div class="row" style="width:100%;padding:30px;">
        <div style="width:40%">
        @foreach($rows as $row)
            <div class="row" >
                <div class="card-box" style="width:100%;max-width:100%">
                    <h1>Profile Admin</h1><br>
                    <div class="garis"></div><div class="garis2"></div>
                    <div class="card-box cb">
                    <img src="https://i.postimg.cc/1zMnMc8x/admin-image.png"  style="width:200px;"><br>
                </div>
                <div class="card-box cb" style="padding:40px;">
                    <label class="txt-lbl">Username : {{ $rows[0]->name }}</label><br>
                    <label class="txt-lbl">Email : {{ $rows[0]->email }}</label><br>
                    <label class="txt-lbl">Nomor Hp : +{{ $rows[0]->nohp }}</label><br>
                    <a class="btn btn-sm btn-warning" href="/profile/profileedit/{{ $row->id }}">Edit</a>
                </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-md-6 col-lg-7">
            <div class="card-box"style="width:100%;height:347px;margin-left:50px;">
            <h1>Members</h1><br>
            <div class="garis"></div><div class="garis2"></div><br>
                <div class="card" style="width:100%;max-width:100%;max-height:230px;">
                    <div class="card-header">
                        <form class="form-inline">
                            <div class="form-group mr-1">
                                <input class="form-control" style="max-width:120px;" type="text" name="q2" value="{{ $q2}}" placeholder="Pencarian..." />
                            </div>
                            <div class="form-group mr-1">
                                <button class="btn btn-warning">Refresh</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body p-0 table-responsive">
                        <table class="table table-bordered table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                        <?php $no = 1 ?>
                        @foreach($rows2 as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td class="btn-outline-secondary">{{ $row->email }}</td>
                                </tr>
                        @endforeach
                        </table>
                    </div>
                <div>
            </div>
        </div>
</div>
</body>
</html>
@endsection
