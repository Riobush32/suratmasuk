<?php

namespace App\Http\Controllers;

use App\Models\Sifat;
use App\Models\Status;
use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\TemplateSurat;
use App\Models\CatatanSuratKeluar;
use Illuminate\Support\Facades\Auth;

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
        $diperiksaStaff = SuratKeluar::where('status_id', 1)->count();
        $diperiksaSekertaris = SuratKeluar::where('status_id',2)->count();
        $diperiksaKepala = SuratKeluar::where('status_id',3)->count();
        $selesai = SuratKeluar::where('status_id', '4')->count();
        $active = 'suratKeluar';
        return view('page.suratKeluar.index',[
            'data' => $data,
            'diperiksaStaff' => $diperiksaStaff,
            'diperiksaSekertaris' => $diperiksaSekertaris,
            'diperiksaKepala' => $diperiksaKepala,
            'selesai' => $selesai,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function addSuratKeluar($template_id){
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
        $status = Status::all();
        $template = TemplateSurat::find($template_id);

        $active = 'suratKeluar';
        return view('page.suratKeluar.add',[
            'sifat' => $sifat,
            'status' => $status,
            'klasifikasi' => $klasifikasi,
            'template' => $template,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }
    public function store(Request $request){
        SuratKeluar::create([
            'nomor_surat' => $request->nomor_surat,
            'klasifikasi_id' => $request->klasifikasi,
            'sifat_id' => $request->sifat,
            'status_id' => $request->status,
            'judul_surat' => $request->judul_surat,
            'tanggal' => $request->tanggal_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,

            'lampiran' => $request->lampiran,
            'isi' => $request->editor_content
        ]);
        return redirect()->route('suratKeluar')->with('success','Data Surat Masuk Berhasil Ditambahkan');
    }

    public function edit($id){
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
        $suratKeluar = SuratKeluar::find($id);
        $sifat = Sifat::all();
        $klasifikasi = Klasifikasi::all();
        $status = Status::all();

        $active = 'suratKeluar';
        return view('page.suratKeluar.edit',[
            'sifat' => $sifat,
            'status' => $status,
            'suratKeluar' => $suratKeluar,
            'klasifikasi' => $klasifikasi,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function update(Request $request){
        $suratKeluar = SuratKeluar::find($request->id);
        $suratKeluar->update([
            'nomor_surat' => $request->nomor_surat,
            'klasifikasi_id' => $request->klasifikasi,
            'sifat_id' => $request->sifat,
            'status_id' => $request->status,
            'judul_surat' => $request->judul_surat,
            'tanggal' => $request->tanggal_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,

            'lampiran' => $request->lampiran,
            'isi' => $request->editor_content
        ]);
        return redirect()->route('suratKeluar')->with('success','Data Surat Masuk Berhasil Ditambahkan');
    }
    public function delete($id){
        SuratKeluar::find($id)->delete();
        return redirect()->route('suratKeluar')->with('success','Data Surat Keluar Berhasil Dihapus');
    }
    public function info($id){
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
                'name' => 'Info',
                'icon' => 'fa-info',
                'link' => '',
            ],
        ];
        $suratKeluar = SuratKeluar::find($id);
        $catatan = CatatanSuratKeluar::where('surat_keluar_id', $id)->get();
        $active ='suratKeluar';
        return view('page.suratKeluar.info',[
            'suratKeluar' => $suratKeluar,
            'catatan' => $catatan,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }
    public function updateInfo(Request $request)
    {
        // Cari data berdasarkan ID
        $suratKeluar = SuratKeluar::find($request->id);

        if (!$suratKeluar) {
            return redirect()->route('suratKeluar')->with('error', 'Data tidak ditemukan.');
        }

        // Validasi status input
        if (!$request->status) {
            return redirect()->back()->withErrors(['message' => 'Status tidak valid.']);
        }

        if($request->catatan){
            CatatanSuratKeluar::create([
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id,
                'surat_keluar_id' => $suratKeluar->id
            ]);
            $suratKeluar->update([
                'status_id' => $request->status,
            ]);
            return redirect()->route('suratKeluar')->with('success', 'Status berhasil diperbarui.');
        }

        $suratKeluar->update([
            'status_id' => $request->status,
        ]);

        return redirect()->route('suratKeluar')->with('success', 'Status berhasil diperbarui.');
    }

    public function print($id){
        $suratKeluar = SuratKeluar::find($id);
        return view('page.suratKeluar.print',[
           'suratKeluar' => $suratKeluar
        ]);
    }
}
