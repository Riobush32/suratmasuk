<?php

namespace App\Http\Controllers;

use App\Models\Sifat;
use App\Models\Status;
use App\Models\ColorList;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class SettingController extends Controller
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
                'name' => 'Setting',
                'icon' => 'fa-gear',
                'link' => '/setting',
            ],
            [
                'name' => 'Components',
                'icon' => 'fa-sliders',
                'link' => '',
            ],
        ];
        $sifats = Sifat::latest()->paginate(5);
        $klasifikasis = Klasifikasi::latest()->paginate(5);
        $statuses = Status::latest()->paginate(5);
        $active = 'setting';
        return view('page.setting.index',[
            'sifats' => $sifats,
            'klasifikasis' => $klasifikasis,
            'statuses' => $statuses,
            'active' => $active,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function addSifat(){
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Setting',
                'icon' => 'fa-gear',
                'link' => '/setting',
            ],
            [
                'name' => 'Components',
                'icon' => 'fa-sliders',
                'link' => '/setting',
            ],
            [
                'name' => 'Sifat',
                'icon' => 'fa-file-shield',
                'link' => '/setting',
            ],
            [
                'name' => 'Add',
                'icon' => 'fa-file-circle-plus',
                'link' => '',
            ],
        ];
        $colors = ColorList::all();
        return view('page.setting.add-sifats',[
            'breadcrumbs' => $breadcrumbs,
            'active' => 'setting',
            'colors' => $colors,
        ]);
    }

    public function addKlasifikasi(){
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Setting',
                'icon' => 'fa-gear',
                'link' => '/setting',
            ],
            [
                'name' => 'Components',
                'icon' => 'fa-sliders',
                'link' => '/setting',
            ],
            [
                'name' => 'Klasifikasi',
                'icon' => 'fa-layer-group',
                'link' => '/setting',
            ],
            [
                'name' => 'Add',
                'icon' => 'fa-file-circle-plus',
                'link' => '',
            ],
        ];
        $colors = ColorList::all();
        return view('page.setting.add-klasifikasis',[
            'breadcrumbs' => $breadcrumbs,
            'active' => 'setting',
            'colors' => $colors,
        ]);
    }

    public function addStatus(){
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Setting',
                'icon' => 'fa-gear',
                'link' => '/setting',
            ],
            [
                'name' => 'Components',
                'icon' => 'fa-sliders',
                'link' => '/setting',
            ],
            [
                'name' => 'Status',
                'icon' => 'fa-check-double',
                'link' => '/setting',
            ],
            [
                'name' => 'Add',
                'icon' => 'fa-file-circle-plus',
                'link' => '',
            ],
        ];
        $colors = ColorList::all();
        return view('page.setting.add-Status',[
            'breadcrumbs' => $breadcrumbs,
            'active' => 'setting',
            'colors' => $colors,
        ]);
    }

    public function storeSifat(Request $request){

        Sifat::create([
            'color_list_id' => $request->color_list_id,
            'name' => $request->name,
        ]);
        return redirect()->route('setting')->with('success','Data Surat Sifat Ditambahkan');
    }

    public function storeStatus(Request $request){

        Status::create([
            'color_list_id' => $request->color_list_id,
            'name' => $request->name,
        ]);
        return redirect()->route('setting')->with('success','Data Surat Sifat Ditambahkan');
    }

    public function storeKlasifikasi(Request $request){

        Klasifikasi::create([
            'color_list_id' => $request->color_list_id,
            'name' => $request->name,
        ]);
        return redirect()->route('setting')->with('success','Data Surat Sifat Ditambahkan');
    }

    public function editSifat($id){
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Setting',
                'icon' => 'fa-gear',
                'link' => '/setting',
            ],
            [
                'name' => 'Components',
                'icon' => 'fa-sliders',
                'link' => '/setting',
            ],
            [
                'name' => 'Sifat',
                'icon' => 'fa-file-shield',
                'link' => '/setting',
            ],
            [
                'name' => 'Edit',
                'icon' => 'fa-file-circle-edit',
                'link' => '',
            ],
        ];
        $sifat = Sifat::find($id);
        $colors = ColorList::all();
        return view('page.setting.edit-sifats', [
            'active' => 'setting',
            'sifat' => $sifat,
            'breadcrumbs' => $breadcrumbs,
            'colors' => $colors,
        ]);
    }

    public function editStatus($id){
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Setting',
                'icon' => 'fa-gear',
                'link' => '/setting',
            ],
            [
                'name' => 'Components',
                'icon' => 'fa-sliders',
                'link' => '/setting',
            ],
            [
                'name' => 'Status',
                'icon' => 'fa-check-double',
                'link' => '/setting',
            ],
            [
                'name' => 'Edit',
                'icon' => 'fa-file-circle-edit',
                'link' => '',
            ],
        ];
        $status = Status::find($id);
        $colors = ColorList::all();
        return view('page.setting.edit-status', [
            'active' => 'setting',
            'status' => $status,
            'breadcrumbs' => $breadcrumbs,
            'colors' => $colors,
        ]);
    }

    public function editKlasifikasi($id){
        $breadcrumbs =
        [
            [
                'name' => 'Home',
                'icon' => 'fa-house-chimney',
                'link' => '/',
            ],
            [
                'name' => 'Setting',
                'icon' => 'fa-gear',
                'link' => '/setting',
            ],
            [
                'name' => 'Components',
                'icon' => 'fa-sliders',
                'link' => '/setting',
            ],
            [
                'name' => 'Klasifikasi',
                'icon' => 'fa-layer-group',
                'link' => '/setting',
            ],
            [
                'name' => 'Edit',
                'icon' => 'fa-file-circle-edit',
                'link' => '',
            ],
        ];
        $klasifikasi = Klasifikasi::find($id);
        $colors = ColorList::all();
        return view('page.setting.edit-klasifikasis', [
            'active' => 'setting',
            'klasifikasi' => $klasifikasi,
            'breadcrumbs' => $breadcrumbs,
            'colors' => $colors,
        ]);
    }

    public function updateSifat(Request $request){
        $sifat = Sifat::find($request->id);
        $sifat->update([
            'color_list_id' => $request->color_list_id,
            'name' => $request->name,
        ]);
        return redirect()->route('setting')->with('success','Data Surat Sifat Berhasil Diubah');
    }

    public function updateKlasifikasi(Request $request){
        $klasifikasi = Klasifikasi::find($request->id);
        $klasifikasi->update([
            'color_list_id' => $request->color_list_id,
            'name' => $request->name,
        ]);
        return redirect()->route('setting')->with('success','Data Surat Sifat Berhasil Diubah');
    }
    public function updateStatus(Request $request){
        $status = Status::find($request->id);
        $status->update([
            'color_list_id' => $request->color_list_id,
            'name' => $request->name,
        ]);
        return redirect()->route('setting')->with('success','Data Surat Sifat Berhasil Diubah');
    }

    public function destroySifat($id){
        Sifat::find($id)->delete();
        return redirect()->route('setting')->with('success','Data Surat Sifat Berhasil Dihapus');
    }
    public function destroyKlasifikasi($id){
        Klasifikasi::find($id)->delete();
        return redirect()->route('setting')->with('success','Data Surat Sifat Berhasil Dihapus');
    }
    public function destroyStatus($id){
        Status::find($id)->delete();
        return redirect()->route('setting')->with('success','Data Surat Sifat Berhasil Dihapus');
    }
}
