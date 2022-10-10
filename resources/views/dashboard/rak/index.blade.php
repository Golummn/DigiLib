@extends('dashboard/layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Rak Perpustakaan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6">
            <div class="">
                <a class="btn btn-success mb-3" href="{{ route('rak.create') }}">
                    <i class="fas fa-plus"></i> Tambah Rak
                </a>
            </div>
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white d-flex align-items-center flex-row justify-content-around">
                    <h5 class="flex-grow-1">Daftar Rak Perpustakaan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($rak as $data)
                            <div class="col-md-3 mt-3">
                                <div class="card bg-danger rounded overflow-hidden">
                                    <div class="card-body p-0 text-center">
                                        <i class="fa fa-book text-white fa-5x mt-4"></i>
                                        <p class="text-white mt-3">{{$data->nama_rak}}</p>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons" style="width:100%;">
                                            <div class="btn btn-success">
                                                <a href="{{ route('buku.show', $data->id) }}" class="btn"><i class="fas fa-plus text-white"></i></a>
                                            </div>
                                            <div class="btn btn-info">
                                                <a href="{{ route('rak.show', $data->id) }}" class="btn"><i class="fas fa-info text-white"></i></a>
                                            </div>
                                            <div class="btn btn-primary">
                                                <a href="{{ route('buku.show', $data->id) }}" class="btn"><i class="fas fa-edit text-white"></i></a>
                                            </div>
                                            <form action="{{ route('rak.destroy',$data->id) }}" method="POST" enctype="multipart/form-data" class="btn btn-danger">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn delete-confirm">
                                                        <i class="fas fa-trash text-white"></i>
                                                    </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mx-3 my-3">
                        {{ $rak->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<a href="{{ route('rak.edit', $data->id) }}">
    <div class="btn btn-info btn-block inline"><i class="fas fa-info"></i></div>
</a>
<a href="{{ route('rak.edit', $data->id) }}">
    <div class="btn btn-primary btn-block inline"><i class="fas fa-edit"></i></div>
</a>
<form action="{{ route('rak.destroy',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <button class="btn btn-danger btn-block inline delete-confirm">
            <i class="fas fa-trash"></i>
        </button>
</form>