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
<center><h1>Edit Profile Admin <br> </h1></center>
<br>
<center><div class="card bd"><i class="fas fa-edit ff"></i>
<div class="row">
    <div class="col-md-12">
    @foreach($admin as $a)
	<form action="/profile/update" method="POST">
		{{ csrf_field() }}
        @method('PUT')
        <input type="hidden" name="id" value="{{ $a->id }}"> <br/>
            <div class="form-group">
                <label>Nama User <span class="text-danger">*</span></label>
                <input class="form-control"  type="text" name="name" value="{{  $a->name}}" />
            </div>
            <!-- Ubah Email -->
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="{{$a->email}}" />
            </div>
            <!-- Ubah Email -->
            <div class="form-group">
                <label>No Hp <span class="text-danger">*</span></label>
                <input class="form-control" type="nohp" name="nohp" value="{{$a->nohp}}" />
            </div>
            <!-- Ubah PW -->
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" placeholder="Masukan Password"/>
                <p class="form-text" style="float:left;color:gray;font-size:14px">* Kosongkan jika tidak ingin mengubah password.</p><br><br><br>
            </div>
            <!-- Simpan data -->
            <div class="form-group">
                <button class="btn btn-warning" type="submit" value="Simpan Data">Simpan</button>
                <a class="btn btn-danger" href="{{ route('profile.index') }}">Kembali</a>
            </div>
        </form>
        @endforeach
    </div>
</div>
</div></center>
@endsection

