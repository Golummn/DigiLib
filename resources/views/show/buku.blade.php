@extends('show.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="py-5 bg-danger text-center text-white">
                <h1>Koleksi Buku</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-8 col-sm-6">
                <form class="my-5 mw-200 navbar-search" method="GET">
                    <div class="input-group">
                        <input type="hidden" value="100" name="size">
                        <input type="text" name="key" class="form-control bg-light rounded" placeholder="Search..." value="{{ $_GET['key'] ?? '' }}"/>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                Search
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            @foreach ($buku as $data)   
                <div class="col-3">
                    <a href="{{$data->id}}" class="card-list">
                        <div class="card my-3">
                            <img src="{{ $data->gambar_url }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$data->judul_buku}}</h5>
                            </div>
                        </div>    
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection