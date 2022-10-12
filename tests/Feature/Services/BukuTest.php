<?php

namespace Tests\Feature\Services;

use App\Helper\Media;
use App\Http\Requests\BukuAddRequest;
use App\Http\Requests\BukuUpdateRequest;
use App\Models\Buku;
use App\Models\Rak;
use App\Services\BukuService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BukuTest extends TestCase
{
    use RefreshDatabase, Media;

    private BukuService $bukuService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bukuService = $this->app->make(BukuService::class);
    }


    public function test_provider()
    {
        self::assertTrue(true);
    }

    public function test_add_buku_success()
    {
        $rak = Rak::factory()->create();
        $request = new BukuAddRequest([
            'judul_buku' => 'test',
            'kode_buku' => 'test',
            'penerbit' => 'test',
            'pengarang' => 'test',
            'tahun_terbit' => 'test',
            'jumlah_buku' => 'test',
            'deskripsi' => 'test',
        ]);

        $this->bukuService->add($request, $rak->id);

        $this->assertDatabaseCount('buku', 1);
        $this->assertDatabaseHas('buku', [
            'judul_buku' => 'test',
            'kode_buku' => 'test',
            'penerbit' => 'test',
            'pengarang' => 'test',
            'tahun_terbit' => 'test',
            'jumlah_buku' => 'test',
            'deskripsi' => 'test',
            'gambar_url' => null,
            'gambar_path' => null,
        ]);
    }


    public function test_list_buku()
    {
        Buku::factory(20)->create();

        $list = $this->bukuService->list();

        self::assertSame(20, $list->count());

        $list = $this->bukuService->list('salah');

        self::assertSame(0, $list->count());
    }

    public function test_update_buku_success()
    {
        $buku = Buku::factory()->create();
        $request = new BukuUpdateRequest([
            'judul_buku' => 'test update',
            'kode_buku' => 'test update',
            'penerbit' => 'test update',
            'pengarang' => 'test update',
            'tahun_terbit' => 'test update',
            'jumlah_buku' => 'test update',
            'deskripsi' => 'test update',
        ]);

        $result = $this->bukuService->update($request, $buku->id);

        $this->assertDatabaseCount('buku', 1);
        self::assertNotSame($buku->judul_buku, $result->judul_buku);
        self::assertNotSame($buku->kode_buku, $result->kode_buku);
        self::assertNotSame($buku->penerbit, $result->penerbit);
        self::assertNotSame($buku->pengarang, $result->pengarang);
        self::assertNotSame($buku->tahun_terbit, $result->tahun_terbit);
        self::assertNotSame($buku->jumlah_buku, $result->jumlah_buku);
        self::assertNotSame($buku->deskripsi, $result->deskripsi);
    }

    public function test_add_buku_image_success()
    {
        $buku = Buku::factory()->create();

        $file = UploadedFile::fake()->create('file.jpg');

        $result = $this->bukuService->addImage($file, $buku->id);

        $this->assertDatabaseCount('buku', 1);
        $this->assertDatabaseHas('buku', [
            'gambar_path' => $result->gambar_path,
            'gambar_url' => $result->gambar_url,
        ]);

        self::assertFileExists($result->gambar_path);

        @unlink($result->file_path);
    }

    public function test_delete_buku_test()
    {
        $buku = Buku::factory()->create();

        $this->assertDatabaseCount('buku', 1);

        $this->bukuService->delete($buku->id);

        $this->assertDatabaseCount('buku', 0);
    }

    public function test_delete_image_buku_success()
    {

        $file = UploadedFile::fake()->create('file.jpg');
        $uploads = $this->uploads($file, 'test/');
        $buku = Buku::factory()->create([
            'gambar_path' => public_path('storage/' . $uploads['filePath']),
            'gambar_url' => 'url'
        ]);

        self::assertFileExists($buku->gambar_path);
        $this->assertDatabaseCount('buku', 1);

        $this->bukuService->deleteImage($buku->id);

        $this->assertDatabaseCount('buku', 1);
        self::assertFileDoesNotExist($buku->gambar_path);
    }

    public function test_update_image_buku_succes()
    {
        $file = UploadedFile::fake()->create('file.jpg');
        $uploads = $this->uploads($file, 'test/');
        $buku = Buku::factory()->create([
            'gambar_path' => public_path('storage/' . $uploads['filePath']),
            'gambar_url' => 'url'
        ]);


        self::assertFileExists($buku->gambar_path);
        $this->assertDatabaseCount('buku', 1);

        $newFile = UploadedFile::fake()->image('update-file.jpg');
        $result = $this->bukuService->updateImage($newFile, $buku->id);

        $this->assertDatabaseCount('buku', 1);

        self::assertFileDoesNotExist($buku->gambar_path);

        self::assertFileExists($result->gambar_path);

        self::assertNotSame($buku->gambar_path, $result->gambar_path);
        self::assertNotSame($buku->gambar_url, $result->gambar_url);

        @unlink($result->gambar_path);
    }
}
