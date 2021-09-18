<?php

namespace Tests\Feature\Proyek;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProyekTest extends TestCase
{
    use RefreshDatabase;
    /**
     * User dapat membuat sebuah proyek
     *
     * @return void
     */
    public function test_user_dapat_membuat_sebuah_proyek()
    {
        $user = new \App\User([
            'id' => 1,
            'name' => 'yish'
        ]);
        //user membuka halaman dashboard
        //user membuka halaman create proyek
        //user mengisi form
        $this->actingAs($user)->visit('/')->see('Selamat');
        $this->visit('/proyek')->see('Proyek');
        //lihat record yang ada di db apakah sudah sesuai
        //redirect ke halaman list proyek dengan notifikasi sukses menambahkan data
        // $this->visit('/')->see('Login');
        // $this->visit('/proyek');
        // $this->assertTrue(true);
    }
    /**
     * User Dapat melihat list proyek
     *
     * @return void
     */
    public function  test_user_dapat_melihat_list_proyek()
    {

        //user membuka halaman pada dashboard
        //user membuka halaman list proyek
        //user membuka salah satu list proyek
        //user melihat data proyek tersebut sudah sesuai dengan yg ada di database atau belum

                $this->assertTrue(true);
    }
    /**
     * User Dapat melihat list proyek
     *
     * @return void
     */
    public function  test_user_dapat_update_status_sebuah_proyek_existing()
    {


        $this->assertTrue(true);
    }
    /**
     * User Dapat Menghapus sebuah proyek
     *
     * @return void
     */
    public function  test_user_dapat_hapus_sebuah_proyek_existing()
    {

        $this->assertTrue(true);
    }
}
