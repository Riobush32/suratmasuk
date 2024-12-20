<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Models\TemplateSurat;
use Illuminate\Routing\Controller;

class TemplateController extends Controller
{
    public function addTemplate(){
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
                'name' => 'template',
                'icon' => 'fa-boxes-packing',
                'link' => '/surat/template/',
            ],
            [
                'name' => 'add',
                'icon' => 'fa-file-circle-plus',
                'link' => '',
            ],
        ];
    $klasifikasi = Klasifikasi::all();
    $active = 'suratKeluar';
    return view('page.suratKeluar.template.add',[
        'klasifikasi' => $klasifikasi,
        'active' => $active,
        'breadcrumbs' => $breadcrumbs
    ]);
}
public function storeTemplate(Request $request){
    TemplateSurat::create([
        'nama_template' => $request->nama_template,
        'klasifikasi_id' => $request->klasifikasi,
        'isi_surat' => $request->editor_content
    ]);
    return redirect()->route('suratKeluar')->with('success','Data Surat Masuk Berhasil Ditambahkan');
}

public function getTemplate($id)
{
    $template = TemplateSurat::findOrFail($id);
    return response()->json(['content' => $template->content]);
}

public function getTemplateAll(){
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
                'name' => 'template',
                'icon' => 'fa-boxes-packing',
                'link' => '',
            ],
        ];
    $template = TemplateSurat::all();
    $active = 'suratKeluar';
    return view('page.suratKeluar.template.index',[
        'template' => $template,
        'active' => $active,
        'breadcrumbs' => $breadcrumbs
    ]);
}

public function editTemplate($id){
    $template = TemplateSurat::find($id);
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
                'name' => 'template',
                'icon' => 'fa-boxes-packing',
                'link' => '/surat/template/',
            ],
            [
                'name' => 'Edit',
                'icon' => 'fa-file-circle-edit',
                'link' => '',
            ],
        ];
    $active = 'suratKeluar';
    $klasifikasi = Klasifikasi::all();
    return view('page.suratKeluar.template.edit',[
        'template' => $template,
        'klasifikasi' => $klasifikasi,
        'active' => $active,
        'breadcrumbs' => $breadcrumbs
    ]);
}

public function updateTemplate(Request $request){
    $template = TemplateSurat::find($request->id);
    $template->update([
        'nama_template' => $request->nama_template,
        'klasifikasi_id' => $request->klasifikasi,
        'isi_surat' => $request->editor_content
    ]);
    return redirect()->route('allTemplate')->with('success','Data Template Surat Keluar Berhasil Diubah');
}

public function deleteTemplate($id){
    TemplateSurat::destroy($id);
    return redirect()->route('allTemplate')->with('success','Data Template Surat Keluar Berhasil Dihapus');
}
}
