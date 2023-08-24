@extends('layouts.admin')

@section('title', 'Halaman Masyarakat')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Masyarakat')

@section('content')
    <table id="masyarakatTable"class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masyarakat as $k => $v)
            <tr>
                <th>{{ $k += 1 }}</th>
                <th>{{ $v->nik }}</th>
                <th>{{ $v->nama }}</th>
                <th>{{ $v->username }}</th>
                <th>{{ $v->no_telp }}</th>
                <th><a href="{{ route('masyarakat.show', $v->nik)}}" style="text-decoration: underline">Lihat</a></th>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection

@section('js')
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#masyarakatTable').DataTable();
    });
    </script>
@endsection