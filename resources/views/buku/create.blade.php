@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Buku / Tambah Buku</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <a class="btn btn-primary mb-3" href="{{ route('buku.index') }}">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="judul_buku">Judul Buku</label>
                            <input class="form-control" id="judul_buku" type="text" placeholder="judul buku" name="judul_buku" value="{{ old('judul_buku') }}" required>
                        </div>
                       
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="kode_buku">Kode Buku</label>
                            <input class="form-control" id="kode_buku" type="text" placeholder="Kode buku" name="kode_buku" value="{{ old('kode_buku') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="penerbit">Penerbit</label>
                            <input class="form-control" id="penerbit" type="text" placeholder="penerbit" name="penerbit" value="{{ old('penerbit') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="pengarang">Pengarang</label>
                            <input class="form-control" id="pengarang" type="text" placeholder="Pengarang" name="pengarang" value="{{ old('pengarang') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="tahun_terbit">Tahun terbit</label>
                            <input class="form-control" id="tahun_terbit" type="text" placeholder="Tahun terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="jumlah_buku">Jumlah buku</label>
                            <input class="form-control" id="jumlah_buku" type="text" placeholder="Jumlah buku" name="jumlah_buku" value="{{ old('jumlah_buku') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control ckeditor" required>{{ old('deskripsi') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="gambar">Cover Buku</label>
                            <input class="form-control" id="gambar" type="file" placeholder="gambar" name="gambar">
                        </div>
                        <button button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection