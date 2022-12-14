<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Skripsi;
use App\Services\BukuService;
use App\Services\SkripsiService;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    private $titleBuku = 'Buku';
    private $titleSkripsi = 'Skripsi';


    private BukuService $bukuService;
    private SkripsiService $skripsiService;

    public function __construct(BukuService $bukuService, SkripsiService $skripsiService)
    {
        $this->bukuService = $bukuService;
        $this->skripsiService = $skripsiService;
    }


    public function index()
    {
        return view('show.index');
    }
    
    public function admin()
    {
        return view('index');
    }

    public function koleksiBuku(Request $request)
    {
        $title = $this->titleBuku;
        $key = $request->query('key') ?? '';
        $buku = $this->bukuService->list($key, 12);
        return response()->view('show.buku', compact('title', 'buku'));
    }

    public function showBuku($id)
    {
        //
        $title = $this->titleBuku;
        $buku = Buku::find($id);
        return response()->view('show.bukuShow', compact('title', 'buku'));
    }

    public function daftarSkripsi(Request $request)
    {
        $title = $this->titleSkripsi;
        $key = $request->query('key') ?? '';
        $skripsi = $this->skripsiService->list($key, 12);
        return response()->view('show.skripsi', compact('title', 'skripsi'));
    }

    public function showSkripsi($id)
    {
        //
        $title = $this->titleSkripsi;
        $skripsi = Skripsi::find($id);
        return response()->view('show.skripsiShow', compact('title', 'skripsi'));
    }
}
