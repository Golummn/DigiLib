<?php

namespace Tests\Feature\Services;

use App\Models\Rak;
use App\Services\RakService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RakTest extends TestCase
{
    use RefreshDatabase;

    private RakService $rakService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rakService = $this->app->make(RakService::class);
    }

    public function test_provider_rak()
    {
        self::assertTrue(true);
    }

    public function test_add_rak_success()
    {
        $namaRak = 'Standar Penjaminan Mutu';

        $this->rakService->add($namaRak);

        $this->assertDatabaseCount('rak', 1);
        $this->assertDatabaseHas('rak', [
            'nama_rak' => 'Standar Penjaminan Mutu',
        ]);
    }


    public function test_list_rak()
    {
        Rak::factory(20)->create();

        $list = $this->rakService->list();

        self::assertSame(10, $list->count());

        $list = $this->rakService->list('salah');

        self::assertSame(0, $list->count());

        $list = $this->rakService->list('', 5);

        self::assertSame(5, $list->count());
    }

    public function test_update_rak()
    {
        $rak = Rak::factory()->create();

        $namaRak = 'test update';

        $result = $this->rakService->update($namaRak, $rak->id);

        $this->assertDatabaseCount('rak', 1);
        self::assertNotSame($rak->nama_rak, $result->namaRak);
        $this->assertDatabaseCount('rak', 1);
    }

    public function test_delete_rak()
    {
        $rak = Rak::factory()->create();

        $this->assertDatabaseCount('rak', 1);
        $this->rakService->delete($rak->id);
        $this->assertDatabaseCount('rak', 0);
    }
}
