<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@extends('adminlte::page')
@extends('adminlte::page')
@section('title', 'Edit')
@section('content_header')

<style>
    .bd{
        width:600px;
        padding :30px;
        border: 1px solid orange;
    }
    .ff{
        color : orange;
        margin-left:510px;
        margin-top: -10px;
        font-size:20px;
    }
</style>
<center><h1>Edit User <br> </h1></center>
<br>
<center><div class="card bd"><i class="fas fa-edit ff"></i>
<div class="row">
    <div class="col-md-12">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('user.update', $row) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Ubah Nama -->

            <div class="form-group">
                <label>Nama User <span class="text-danger">*</span></label>
                <input class="form-control"  type="text" name="name" value="{{ old('name', $row->name) }}" />
            </div>
            <!-- Ubah Email -->
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="{{ old('email', $row->email) }}" />
            </div>
            <!-- Ubah PW -->
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" placeholder="Masukan Password"/>
                <p class="form-text" style="float:left;color:gray;font-size:14px">* Kosongkan jika tidak ingin mengubah password.</p><br><br><br>
            </div>
            <!-- Simpan data -->
            <div class="form-group">
                <button class="btn btn-warning">Simpan</button>
                <a class="btn btn-danger" href="{{ route('user.index') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>
</div></center>

@endsection
