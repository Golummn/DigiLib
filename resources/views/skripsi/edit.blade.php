@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Skripsi / Ubah Skripsi</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <a class="btn btn-primary mb-3" href="{{ route('skripsi.index') }}">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form action="{{ route('skripsi.update',$skripsi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nim">Nim</label>
                            <input class="form-control" id="nim" type="text" placeholder="Nim" name="nim" value="{{ old('nim',$skripsi->nim) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nama">Nama</label>
                            <input class="form-control" id="nama" type="text" placeholder="nama" name="nama" value="{{ old('nama',$skripsi->nama) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="prodi">Prodi</label>
                            <select class="form-control" id="prodi" name="prodi">
                                <option ><-- Pilih Prodi --></option>
                                <option value="akuntansi" {{ old('prodi',$skripsi->prodi) == "akuntansi" ? 'selected' : '' }}>Akuntansi</option>
                                <option value="manajemen" {{ old('prodi',$skripsi->prodi) == "manajemen" ? 'selected' : '' }}>Manajemen</option>
                                <option value="perbankan syariah" {{ old('prodi',$skripsi->prodi) == "perbankan syariah" ? 'selected' : '' }}>Perbankan syariah</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="pembimbing1">Pembimbing 1</label>
                            <select class="form-control" id="pembimbing1" name="pembimbing1">
                                <option value="test1">test</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="pembimbing2">Pembimbing 2</label>
                            <select class="form-control" id="pembimbing1" name="pembimbing1">
                                <option value="test1">test</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="judul_skripsi">Judul Skripsi</label>
                            <input class="form-control" id="judul_skripsi" type="text" placeholder="judul_skripsi" name="judul_skripsi" value="{{ old('judul_skripsi',$skripsi->judul_skripsi) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="tahun">Tahun</label>
                            <input class="form-control" id="tahun" type="text" placeholder="Tahun" name="tahun" value="{{ old('tahun',$skripsi->tahun) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="kode_skripsi">Kode Skripsi</label>
                            <input class="form-control" id="kode_skripsi" type="text" placeholder="kode skripsi" name="kode_skripsi" value="{{ old('kode_skripsi',$skripsi->kode_skripsi) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="abstrak">Abstrak</label>
                            <textarea name="abstrak" id="abstrak" cols="30" rows="10" class="form-control ckeditor" required>{{ old('abstrak',$skripsi->abstrak) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="file">File Skripsi</label>
                            <input class="form-control" id="file" type="file" placeholder="file" name="file">
                        </div>
                        <button button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection