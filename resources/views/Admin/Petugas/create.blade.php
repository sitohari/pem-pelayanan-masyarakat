@extends('layouts.admin')

@section('title', 'Form Tambah Petugas')
    
@section('css')
    <style>
        .text-primary:hover{
            text-decoration-line: underline;
        }
        .text-grey{
            color: #6c757d;
        }
        .text-grey:hover{
            color: #6c757d;
        }
    </style>
@endsection

@section('header')
    <a href="{{ route('petugas.index')}}" class="text-primary">Data Petugas</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Form Tambah Petugas</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Form Tambah Petugas
                </div>
                <div class="card-body">
                    <form action="{{ route('petugas.store') }}" method="POST">  
                        @csrf
                        <div class="form-group">
                          <label for="nama_petugas">Nama Petugas</label>
                          <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="nama petugas" required >
                        </div>
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" id="username" class="form-control" placeholder="username" required >
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="password" required >
                        </div>
                        <div class="form-group">
                          <label for="no_telp">No Telp</label>
                          <input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="08xxxxx" required >
                        </div>
                        <div class="from-group">
                            <label for="level">Level</label>
                            <div class="input-group mb-3">
                                <select name="level" id="level" class="custom-select">
                                    <option value="petugas" selected>Pilih Level (Defualt Petugas)</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3" style="width: 100%">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            @if (Session::has('username'))
                <div class="alert alert-danger">
                    {{Session::get('username')}}
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $eror)
                    <div class="alert alert-danger">
                        {{ $eror }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
