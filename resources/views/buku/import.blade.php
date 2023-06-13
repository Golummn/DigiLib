<!-- Import Modal -->
<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImport" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImport">Import Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('buku.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="text-danger">*</label>
                        <label for="gambar">File</label>
                        <input type="file" name="file" class="form-control" placeholder="file import" aria-label="file import" aria-describedby="button-addon2">
                    </div>
                    <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                    <a href={{asset('storage/template_mahasiswa.xlsx')}} target="_blank" class="btn btn-success" rel="noopener noreferrer">download template <i class="fas fa-download"></i> </a>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
