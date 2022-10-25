@extends('show.layouts.app')
@section('content')
<div class="container d-flex flex-column min-vh-100">
    <div class="row justify-content-center mb-5">
        <div class="col-md-11">
            <div class="card my-3 border-0">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{$skripsi->gambar_url}}" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-striped table-hover ms-3">
                            <tr>
                                <td>Judul</td>
                                <td>{{$skripsi->judul_skripsi}}</td>
                            </tr>
                            <tr>
                                <td>Kode skripsi</td>
                                <td>{{$skripsi->kode_skripsi}}</td>
                            </tr>
                            <tr>
                                <td>Penulis</td>
                                <td>{{$skripsi->pengarang}}</td>
                            </tr>
                            <tr>
                                <td>Tahun Skripsi</td>
                                <td>{{$skripsi->tahun_terbit}}</td>
                            </tr>
                            <tr>
                                <td>Abstrak</td>
                                <td>{!! $skripsi->deskripsi !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection