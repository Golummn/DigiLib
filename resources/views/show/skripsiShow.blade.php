@extends('show.layouts.app')
@section('content')
<div class="container d-flex flex-column min-vh-100">
    <div class="row justify-content-center mb-5">
        <div class="col-md-11">
            <div class="card my-3 border-0">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if ($skripsi->gambar_path != null)
                            <img src="{{ asset('storage/'.$skripsi->gambar_path) }}" class="img-fluid rounded" alt="gambar buku"/>
                        @else
                            <img src="{{ asset('/assets/images/book.png') }}" class="img-fluid rounded" alt="gambar buku" />
                        @endif
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
                                <td>{{$skripsi->nama}}</td>
                            </tr>
                            <tr>
                                <td>Tahun Skripsi</td>
                                <td>{{$skripsi->tahun}}</td>
                            </tr>
                            <tr>
                                <td>Abstrak</td>
                                <td>{!! $skripsi->abstrak !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
