<?php

namespace App\Http\Controllers;

use App\Models\Sifat;
use App\Models\Status;
use App\Models\SuratMasuk;
use App\Models\Klasifikasi;
use App\Models\catatanMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function info($id){
        $suratMasuk = SuratMasuk::find($id);
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Incoming Letter',
                'icon' => 'fa-envelope-open-text',
                'link' => '/surat-masuk',
            ],
            [
                'name' => 'Edit',
                'icon' => 'fa-file-invoice',
                'link' => '',
            ],
        ];
        // $status = Status::all();
        // $klasifikasi = Klasifikasi::all();
        // $sifat = Sifat::all();
        $catatan = catatanMasuk::all();
        $active ='suratMasuk';
        return view('page.surat-masuk.info',[
            'suratMasuk' => $suratMasuk,
            // 'klasifikasi' => $klasifikasi,
            // 'sifat' => $sifat,
            // 'status' => $status,
            'catatan' => $catatan,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function update(Request $request)
    {
        // Cari data berdasarkan ID
        $suratMasuk = SuratMasuk::find($request->id);

        if (!$suratMasuk) {
            return redirect()->route('suratMasuk')->with('error', 'Data tidak ditemukan.');
        }

        // Validasi status input
        if (!$request->status) {
            return redirect()->back()->withErrors(['message' => 'Status tidak valid.']);
        }

        if($request->catatan_id){
            $catatan = catatanMasuk::find($request->catatan_id);
            $catatan->update([
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id,
            ]);
            $suratMasuk->update([
                'status_id' => $request->status,
            ]);
            return redirect()->route('suratMasuk')->with('success', 'Status berhasil diperbarui.');
        }
        if($request->catatan){
            catatanMasuk::create([
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id,
                'surat_masuk_id' => $suratMasuk->id
            ]);
            $suratMasuk->update([
                'status_id' => $request->status,
            ]);
            return redirect()->route('suratMasuk')->with('success', 'Status berhasil diperbarui.');
        }

        $suratMasuk->update([
            'status_id' => $request->status,
        ]);

        return redirect()->route('suratMasuk')->with('success', 'Status berhasil diperbarui.');
    }
}
