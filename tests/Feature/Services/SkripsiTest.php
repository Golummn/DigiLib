<?php

namespace Tests\Feature\Services;

use App\Helper\Media;
use App\Http\Requests\SkripsiAddRequest;
use App\Http\Requests\SkripsiUpdateRequest;
use App\Models\Rak;
use App\Models\Skripsi;
use App\Services\SkripsiService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SkripsiTest extends TestCase
{
    use RefreshDatabase, Media;

    private SkripsiService $skripsiService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->skripsiService = $this->app->make(SkripsiService::class);
    }


    public function test_provider()
    {
        self::assertTrue(true);
    }

    public function test_add_skripsi_success()
    {
        $rak = Rak::factory()->create();
        $request = new SkripsiAddRequest([
            'nim' => '20215',
            'nama' => 'test',
            'prodi' => 'test',
            'pembimbing1' => 'test',
            'pembimbing2' => 'test',
            'judul_skripsi' => 'test',
            'tahun' => '2001',
            'kode_skripsi' => 'test',
            'abstrak' => 'test',
        ]);

        $this->skripsiService->add($request, $rak->id);

        $this->assertDatabaseCount('skripsi', 1);
        $this->assertDatabaseHas('skripsi', [
            'nim' => '20215',
            'nama' => 'test',
            'prodi' => 'test',
            'pembimbing1' => 'test',
            'pembimbing2' => 'test',
            'judul_skripsi' => 'test',
            'tahun' => '2001',
            'kode_skripsi' => 'test',
            'abstrak' => 'test',
            'file_url' => null,
            'file_path' => null,
        ]);
    }

    public function test_list_skripsi()
    {
        Skripsi::factory(20)->create();

        $list = $this->skripsiService->list();

        self::assertSame(20, $list->count());

        $list = $this->skripsiService->list('salah');

        self::assertSame(0, $list->count());
    }


    public function test_update_skripsi_success()
    {
        $skripsi = Skripsi::factory()->create();
        $request = new SkripsiUpdateRequest([
            'nim' => '20215',
            'nama' => 'test update',
            'prodi' => 'test update',
            'pembimbing1' => 'test update',
            'pembimbing2' => 'test update',
            'judul_skripsi' => 'test update',
            'tahun' => '2001',
            'kode_skripsi' => 'test update',
            'abstrak' => 'test update',
        ]);

        $result = $this->skripsiService->update($request, $skripsi->id);

        $this->assertDatabaseCount('skripsi', 1);
        self::assertNotSame($skripsi->nim, $result->nim);
        self::assertNotSame($skripsi->nama, $result->nama);
        self::assertNotSame($skripsi->prodi, $result->prodi);
        self::assertNotSame($skripsi->pembimbing1, $result->pembimbing1);
        self::assertNotSame($skripsi->pembimbing2, $result->pembimbing2);
        self::assertNotSame($skripsi->judul_skripsi, $result->judul_skripsi);
        self::assertNotSame($skripsi->tahun, $result->tahun);
        self::assertNotSame($skripsi->kode_skripsi, $result->kode_skripsi);
        self::assertNotSame($skripsi->abstrak, $result->abstrak);
    }

    public function test_add_file_skripsi_success()
    {
        $skripsi = Skripsi::factory()->create();

        $file = UploadedFile::fake()->create('file.pdf');

        $result = $this->skripsiService->addFile($skripsi->id, $file);

        $this->assertDatabaseCount('skripsi', 1);
        $this->assertDatabaseHas('skripsi', [
            'file_path' => $result->file_path,
            'file_url' => $result->file_url,
        ]);

        self::assertFileExists($result->file_path);

        @unlink($result->file_path);
    }

    public function test_delete_skripsi_test()
    {
        $skripsi = Skripsi::factory()->create();

        $this->assertDatabaseCount('skripsi', 1);

        $this->skripsiService->delete($skripsi->id);

        $this->assertDatabaseCount('skripsi', 0);
    }

    public function test_delete_file_skripsi_success()
    {

        $file = UploadedFile::fake()->create('file.pdf');
        $uploads = $this->uploads($file, 'test/');
        $skripsi = Skripsi::factory()->create([
            'file_path' => public_path('storage/' . $uploads['filePath']),
            'file_url' => 'url'
        ]);

        self::assertFileExists($skripsi->file_path);
        $this->assertDatabaseCount('skripsi', 1);

        $this->skripsiService->deleteFile($skripsi->id, $file);

        $this->assertDatabaseCount('skripsi', 1);
        self::assertFileDoesNotExist($skripsi->file_path);
    }

    public function test_update_file_skripsi_succes()
    {
        $file = UploadedFile::fake()->create('file.pdf');
        $uploads = $this->uploads($file, 'test/');
        $skripsi = Skripsi::factory()->create([
            'file_path' => public_path('storage/' . $uploads['filePath']),
            'file_url' => 'url'
        ]);


        self::assertFileExists($skripsi->file_path);
        $this->assertDatabaseCount('skripsi', 1);

        $file = UploadedFile::fake()->create('file.pdf');
        $result = $this->skripsiService->editFile($skripsi->id, $file);

        $this->assertDatabaseCount('skripsi', 1);

        self::assertFileDoesNotExist($skripsi->file_path);

        self::assertFileExists($result->file_path);

        self::assertNotSame($skripsi->file_path, $result->file_path);
        self::assertNotSame($skripsi->file_url, $result->file_url);

        @unlink($result->file_path);
    }
}
