@extends('show.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="py-5 bg-danger text-center text-white">
                <h1>Koleksi Buku</h1>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column min-vh-100">
        <div class="row">
            <div class="col-lg-12 col-md-8 col-sm-6">
                <form class="my-5 mw-200 navbar-search" method="GET">
                    <label for="search" class="form-label">
                        <h2 class="text-danger">
                            Cari Buku
                        </h2>
                    </label>
                    <div class="input-group">
                        <input type="hidden" value="100" name="size">
                        <input type="text" name="key" class="form-control bg-light rounded" placeholder="Search..." value="{{ $_GET['key'] ?? '' }}"/>
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">
                                Search
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row row-cols-md-auto">
            @foreach ($buku as $data)
                <div class="col-md-2">
                    <a href="koleksi-buku/{{$data->id}}" class="text-decoration-none">
                        <div class="card my-3 border-0 shadow-sm box-shadow text-danger">
                            @if ($data->gambar_path == null || !file_exists(asset('storage/' . $data->gambar_path)))
                                <img src="{{ asset('/assets/images/book.png') }}" class="img-fluid img-thumbnail" class="card-img-top rounded img-fluid img-thumbnail" alt="cover buku" />
                            @else
                                <img src="{{ asset('storage/' . $data->gambar_path) }}" class="img-fluid img-thumbnail" class="card-img-top rounded img-fluid img-thumbnail" alt="cover buku"/>
                            @endif
                            <div class="card-body">
                                <h6 class="card-title fs-6 fw-normal overflow-hidden" style="height: 2.6rem">{{$data->judul_buku}}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mx-3 my-3">
            {{ $buku->links() }}
        </div>
    </div>
@endsection
