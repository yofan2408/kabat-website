<link href="{{ asset('css/notif.css') }}" rel="stylesheet">
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@extends('adminlte::page')
@section('title', 'Manage User')
@section('content_header')

<!DOCTYPE html>
<html>
<head>
    <!-- Importing Link -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<center><h1>Manage User</h1></center>
<br>
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="card" style="border : 2px solid #FFA500;">
    <div class="card-header" style="background :rgba(255,193,7,0.8);">
        <form class="form-inline row" style="max-width:100%">
            <div class="form-group mr-1">
                <input class="mr form-control" type="text" name="q" value="{{ $q}}" placeholder="Pencarian..." />
            </div>
            <div class="form-group mr-1">
                <button class="fas fa-sync-alt butty" style="background:none"></button>
            </div>
            <div class="form-group mr-1" style="left:98%;top:78%;position:absolute">
                <a class="fas fa-user-plus btn bg-gradient-dark butty" href="{{ route('user.create') }}"></a>
            </div>
            <div class="form-group mr-1" style="margin-left:63%;max-width:63%">
               <label >Jumlah Data : {{ $user->total() }} user <br/></label>
            </div>
        </form>
</div>

<!-- Tabel User -->
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password
                    <th>Action</th>
                </tr>

            </thead>
            <?php $no = 1 ?>
            @foreach($rows as $row)
            <tr >
                <td>{{ $no++ }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->password}}<td>
                    <a class="btn btn-sm btn-warning fa fa-edit" href="{{ route('user.edit', $row) }}"></a>
                    <form method="POST" action="{{ route('user.destroy', $row) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger fa fa-trash-alt" onclick="return confirm('Hapus Data?')"></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<!-- floating notif -->

</body>
</html>
@endsection
