<?php

namespace App\Http\Controllers;

use App\Models\Sifat;
use App\Models\Status;
use App\Models\SuratMasuk;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class SuratMasukController extends Controller
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
                'icon' => 'fa-envelope-open-text',
                'link' => '/surat-masuk',
            ],
            [
                'name' => 'List',
                'icon' => 'fa-envelopes-bulk',
                'link' => '',
            ],
        ];
        $data = SuratMasuk::latest()->paginate(5);
        $active = 'suratMasuk';
        return view('page.surat-masuk.index',[
            'data' => $data,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function add(){
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
                'name' => 'Add',
                'icon' => 'fa-file-circle-plus',
                'link' => '',
            ],
        ];
        $status = Status::all();
        $klasifikasi = Klasifikasi::all();
        $sifat = Sifat::all();
        $active ='suratMasuk';
        return view('page.surat-masuk.add',[
            'active' => $active,
            'klasifikasi' => $klasifikasi,
            'sifat' => $sifat,
            'status' => $status,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function store(Request $request){
        if(!$request->file_patch){
            SuratMasuk::create([
                'nomor_surat' => $request->nomor_surat,
                'instansi_pengirim' => $request->instansi_pengirim,
                'tanggal_surat' => $request->tanggal_surat,
                'tanggal_diterima' => $request->tanggal_diterima,
                'nomor_agenda' => $request->nomor_agenda,
                'klasifikasi_id'=> $request->klasifikasi,
                'lampiran' => $request->lampiran,
                'status_id'=> $request->status,
                'sifat_id' => $request->sifat,
            ]);
            return redirect()->route('suratMasuk')->with('success','Data Surat Masuk Berhasil Ditambahkan');
        }else{
            // Validasi file
            $request->validate([
                'file_patch' => 'required|mimes:pdf|max:20480', // Sesuaikan aturan validasi
            ]);
            // Ambil file dari request
            $file = $request->file('file_patch');
            // Tentukan lokasi penyimpanan (langsung ke folder public/uploads)
            $destinationPath = public_path('suratmasuks');
            // Buat nama unik untuk file
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Pindahkan file ke folder tujuan
            $file->move($destinationPath, $fileName);

            SuratMasuk::create([
                'nomor_surat' => $request->nomor_surat,
                'instansi_pengirim' => $request->instansi_pengirim,
                'tanggal_surat' => $request->tanggal_surat,
                'tanggal_diterima' => $request->tanggal_diterima,
                'nomor_agenda' => $request->nomor_agenda,
                'klasifikasi_id'=> $request->klasifikasi,
                'lampiran' => $request->lampiran,
                'status_id'=> $request->status,
                'sifat_id' => $request->sifat,
                'file_patch' => $fileName,
            ]);
            return redirect()->route('suratMasuk')->with('success','Data Surat Masuk Berhasil Ditambahkan');
        }

    }

    public function edit($id){
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
                'icon' => 'fa-file-pen',
                'link' => '',
            ],
        ];
        $status = Status::all();
        $klasifikasi = Klasifikasi::all();
        $sifat = Sifat::all();
        $active ='suratMasuk';
        return view('page.surat-masuk.edit',[
            'suratMasuk' => $suratMasuk,
            'klasifikasi' => $klasifikasi,
            'sifat' => $sifat,
            'status' => $status,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function update(Request $request){
        // Cari data berdasarkan ID
        $suratMasuk = SuratMasuk::find($request->id);

        if (!$suratMasuk) {
            return redirect()->route('suratMasuk')->with('error', 'Data tidak ditemukan.');
        }

        if (!$request->hasFile('file_patch')) {
            // Update tanpa file
            $suratMasuk->update($request->only([
                'nomor_surat',
                'instansi_pengirim',
                'tanggal_surat',
                'tanggal_diterima',
                'nomor_agenda',
                'klasifikasi_id',
                'lampiran',
                'status_id',
                'sifat_id',
            ]));

            return redirect()->route('suratMasuk')->with('success', 'Data Surat Masuk berhasil diperbarui.');
        }

        // Validasi file
        $request->validate([
            'file_patch' => 'required|mimes:pdf|max:20480',
        ]);

        // Hapus file lama jika ada
        if ($suratMasuk->file_patch) {
            $oldFilePath = public_path('suratmasuks/' . $suratMasuk->file_patch);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }

        // Simpan file baru
        $newFile = $request->file('file_patch');
        $newFileName = time() . '_' . $newFile->getClientOriginalName();
        $newFile->move(public_path('suratmasuks'), $newFileName);

        // Update data dengan file baru
        $suratMasuk->update(array_merge(
            $request->only([
                'nomor_surat',
                'instansi_pengirim',
                'tanggal_surat',
                'tanggal_diterima',
                'nomor_agenda',
                'klasifikasi_id',
                'lampiran',
                'status_id',
                'sifat_id',
            ]),
            ['file_patch' => $newFileName]
        ));

        return redirect()->route('suratMasuk')->with('success', 'Data Surat Masuk berhasil diperbarui.');
    }

    public function destroy($id){
        SuratMasuk::find($id)->delete();
        return redirect()->route('suratMasuk')->with('success', 'User deleted successfully');
    }



}
