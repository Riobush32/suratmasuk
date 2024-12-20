<div>
    <label class="text-black form-control w-full max-w-xs">
        <div class="label">
            <span class="label-text text-gray-50">template surat</span>
        </div>
        <select
            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
             wire:model.live="selectedTemplate">
            <option disabled selected value="">pilih klasifikasi surat</option>
            @foreach ($templates as $item)
                <option value="{{ $item->id }}">
                    {{ $item->nama_template }}
                </option>
            @endforeach
        </select>
    </label>

    <div class="mt-5 p-4 border border-gray-300 bg-slate-100 rounded-lg">
        <button
        class="mt-3 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
        onclick="copyToClipboard()"
    >
        Copy
    </button>
        <div id="templateContent">{{ $templateContent }}</div>
    </div>

    <div class="rounded-xl overflow-hidden border-white border mt-3">
        <div id="toolbar" class="bg-slate-400">
            <button class="ql-bold"></button>
            <button class="ql-italic"></button>
            <button class="ql-underline"></button>
            <button class="ql-strike"></button>
        </div>
        <div id="editor" class="min-h-56 text-white"></div>
    </div>

    <textarea id="editorContent"  style="display: none;"></textarea>

    <script>
        function copyToClipboard() {
            const content = document.getElementById("templateContent").innerText;
            navigator.clipboard.writeText(content).then(() => {
                alert("Konten berhasil disalin ke clipboard!");
            }).catch(err => {
                alert("Gagal menyalin: " + err);
            });
        }
    </script>
    @vite(['resources/js/editor2.js'])
</div>
