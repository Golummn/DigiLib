@extends('show.layouts.app')
@section('content')
<div class="container d-flex flex-column min-vh-100">
    <div class="row justify-content-center mb-5 mt-5">
        <div class="col-md-11">
            <div class="card my-3 border-0">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if ($buku->gambar_path == null || !file_exists(public_path('storage/' . $buku->gambar_path)))
                            <img src="{{ asset('/assets/images/book.png') }}" class="img-fluid rounded" alt="gambar buku" />
                        @else
                            <img src="{{ asset('storage/' . $buku->gambar_path) }}" class="img-fluid rounded" alt="gambar buku"/>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-striped table-hover ms-5">
                            <tr>
                                <td>Judul</td>
                                <td>{{$buku->judul_buku}}</td>
                            </tr>
                            <tr>
                                <td>Kode Buku</td>
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
