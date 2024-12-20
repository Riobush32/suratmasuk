<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TemplateSurat;

class TemplateLivewire extends Component
{
    public $templates = [];
    public $selectedTemplate = null;
    public $templateContent = '';

    public function mount()
    {
        // Ambil semua template dari database ketika pertama kali halaman dimuat
        $this->templates = TemplateSurat::all();
    }

    public function updatedSelectedTemplate($templateId)
    {
        // Ambil konten dari template yang dipilih
        $template = TemplateSurat::find($templateId);

        if ($template) {
        $this->templateContent = $template->content;
    } else {
        $this->templateContent = "Template tidak ditemukan.";
    }
    }

    public function render()
    {
        $template = TemplateSurat::all();
        return view('livewire.template-livewire', ['template' => $template]);
    }
}
