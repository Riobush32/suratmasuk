<?php

namespace App\Http\Controllers;

use App\Models\Sifat;
use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index(){
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Incoming Letter',
                'icon' => 'fa-up-right-from-square',
                'link' => '/surat-keluar',
            ],
            [
                'name' => 'List',
                'icon' => 'fa-envelopes-bulk',
                'link' => '',
            ],
        ];
        $data = SuratKeluar::latest()->paginate(5);
        $active = 'suratKeluar';
        return view('page.suratKeluar.index',[
            'data' => $data,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function addSuratKeluar(){
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Incoming Letter',
                'icon' => 'fa-up-right-from-square',
                'link' => '/surat-keluar',
            ],
            [
                'name' => 'List',
                'icon' => 'fa-file-circle-plus',
                'link' => '',
            ],
        ];
        $sifat = Sifat::all();
        $klasifikasi = Klasifikasi::all();
        $active = 'suratKeluar';
        return view('page.suratKeluar.add',[
            'sifat' => $sifat,
            'klasifikasi' => $klasifikasi,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
