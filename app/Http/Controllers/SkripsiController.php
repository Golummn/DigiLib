<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\SkripsiAddRequest;
use App\Http\Requests\SkripsiUpdateRequest;
use App\Models\Skripsi;
use App\Repositories\DosenRepository;
use App\Services\SkripsiService;
use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    //

    private $title = 'Skripsi';

    private SkripsiService $skripsiService;
    private DosenRepository $dosenRepository;

    public function __construct(SkripsiService $skripsiService, DosenRepository $dosenRepository)
    {
        $this->skripsiService = $skripsiService;
        $this->dosenRepository = $dosenRepository;
    }

    public function index(Request $request)
    {
        $title = $this->title;
        $key = $request->query('key') ?? '';
        $skripsi = $this->skripsiService->list($key, 10);
        return response()->view('skripsi.index', compact('title', 'skripsi'));
    }

    public function show($id)
    {
        //
        $title = $this->title;
        $skripsi = Skripsi::find($id);
        return response()->view('skripsi.show', compact('title', 'skripsi'));
    }

    public function create()
    {
        //
        $title = $this->title;
        $dosen = $this->dosenRepository->getAllDosen();
        return response()->view('skripsi.create', compact('title', 'dosen'));
    }

    public function store(SkripsiAddRequest $request)
    {
        //
        $file = $request->file('file');
        $image = $request->file('gambar');
        try {
            $skripsi = $this->skripsiService->add($request);
            if ($file != null) {
                $this->skripsiService->addFile($skripsi->id, $file);
            }
            if ($image != null) {
                $this->skripsiService->addImage($image, $skripsi->id);
            }
            return response()->redirectTo(route('skripsi.index'))->with('success', 'Berhasil menambahkan skripsi');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }

    public function edit($id)
    {
        //
        $title = $this->title;
        $skripsi = Skripsi::find($id);
        $dosen = $this->dosenRepository->getAllDosen();
        return response()->view('skripsi.edit', compact('title', 'skripsi', 'dosen'));
    }

    public function update(SkripsiUpdateRequest $request, $id)
    {
        //
        $file = $request->file('file');

        try {
            $result = $this->skripsiService->update($request, $id);
            if ($file != null) {
                $this->skripsiService->editFile($id, $file);
            }
            return response()->redirectTo(route('skripsi.index'))->with('success', 'Berhasil mengubah skripsi');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }

    public function destroy($id)
    {
        //
        try {
            $this->skripsiService->delete($id);
            return response()->redirectTo(route('skripsi.index'))->with('success', 'Berhasil menghapus skripsi');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
