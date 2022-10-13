<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\BukuAddRequest;
use App\Http\Requests\BukuUpdateRequest;
use App\Models\Buku;
use App\Services\BukuService;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    //

    private $title = 'Buku';

    private BukuService $bukuService;

    public function __construct(BukuService $bukuService)
    {
        $this->bukuService = $bukuService;
    }

    public function index(Request $request)
    {
        $title = $this->title;
        $key = $request->query('key') ?? '';
        $buku = $this->bukuService->list($key, 10);
        return response()->view('buku.index', compact('title', 'buku'));
    }

    public function create()
    {
        //
        $title = $this->title;
        return response()->view('buku.create', compact('title'));
    }

    public function store(BukuAddRequest $request)
    {
        //
        $gambar = $request->file('gambar');
        try {
            $buku = $this->bukuService->add($request);
            $this->bukuService->addImage($gambar, $buku->id);
            return response()->redirectTo(route('buku.index'))->with('success', 'Berhasil menambahkan buku');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }
    public function edit($id)
    {
        //
        $title = $this->title;
        $buku = Buku::find($id);
        return response()->view('buku.edit', compact('title', 'buku'));
    }

    public function update(BukuUpdateRequest $request, $id)
    {
        //
        $gambar = $request->file('gambar');

        try {
            $result = $this->bukuService->update($request, $id);
            if ($gambar != null) {
                $this->bukuService->updateImage($gambar, $id);
            }
            return response()->redirectTo(route('buku.index'))->with('success', 'Berhasil mengubah buku');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }

    public function destroy($id)
    {
        //
        try {
            $this->bukuService->delete($id);
            return response()->redirectTo(route('buku.index'))->with('success', 'Berhasil menghapus buku');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
