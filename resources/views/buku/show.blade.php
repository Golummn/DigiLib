@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Buku /Detail Buku </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{$buku->gambar_url}}" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-striped table-hover ms-3">
                                <tr>
                                    <td>Judul</td>
                                    <td class="text-danger">{{$buku->judul_buku}}</td>
                                </tr>
                                <tr>
                                    <td>Kode buku</td>
                                    <td>{{$buku->kode_buku}}</td>
                                </tr>
                                <tr>
                                    <td>Penerbit</td>
                                    <td>{{$buku->penerbit}}</td>
                                </tr>
                                <tr>
                                    <td>Pengarang</td>
                                    <td>{{$buku->pengarang}}</td>
                                </tr>
                                <tr>
                                    <td>Tahun Terbit</td>
                                    <td>{{$buku->tahun_terbit}}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>{!! $buku->deskripsi !!}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection