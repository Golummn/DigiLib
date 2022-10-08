<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Services\RakService;
use Illuminate\Http\Request;

class RakController extends Controller
{
    //
    private $title = 'Rak';

    private RakService $rakService;

    public function __construct(RakService $rakService)
    {
        $this->rakService = $rakService;
    }

    public function index(Request $request)
    {
        $title = $this->title;
        $key = $request->query('key') ?? '';
        $rak = $this->rakService->list($key, 12);
        return response()->view('dashboard.rak.index', compact('title', 'rak'));
    }


    public function destroy($id)
    {
        try {
            $this->rakService->delete($id);
            return response()->redirectTo(route('rak.index'))->with('success', 'Berhasil menghapus rak');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', 'Gagal menghapus rak, terjadi kesalahan pada server');
        }
    }
}
