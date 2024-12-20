import Quill from 'quill';
import 'quill/dist/quill.snow.css';
document.addEventListener("DOMContentLoaded", function () {


// Definisikan toolbar dengan ID "toolbar"


// Inisialisasi Quill
const quill = new Quill('#editor', {
    theme: 'snow', // Gunakan tema snow
    modules: {
        toolbar:'#toolbar',
    },
});
// Sinkronisasi dengan input tersembunyi setiap kali editor berubah
function syncEditorContent() {
    const content = quill.root.innerHTML; // Ambil konten editor
    document.getElementById('editorContent').value = content; // Sinkronisasi ke textarea
}

quill.on('text-change', syncEditorContent);


// Inisialisasi dengan konten editor saat halaman dimuat
syncEditorContent();
});
