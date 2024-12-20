<style>
    .ql-align-center {
        text-align: center !important;
        /* Menyelaraskan teks di tengah */
    }

    .ql-align-right {
        text-align: right !important;
        /* Menyelaraskan teks di tengah */
    }

    .ql-align-justify {
        text-align: justify !important;
        /* Menyelaraskan teks di tengah */
    }

    .ql-size-small {
        font-size: 12px !important;
        /* Ukuran font kecil */
        line-height: 1.4 !important;
        /* Menyesuaikan tinggi baris untuk ukuran kecil */
    }

    .ql-size-large {
        font-size: 20px !important;
        /* Ukuran font lebih besar */
        line-height: 1.6 !important;
        /* Menyesuaikan tinggi baris untuk ukuran besar */
    }

    .ql-size-huge {
        font-size: 36px !important;
        /* Ukuran font sangat besar */
        line-height: 1.8 !important;
        /* Menyesuaikan tinggi baris untuk ukuran sangat besar */
    }

    /* Mengatur arah teks menjadi Right-to-Left */
    .ql-direction-rtl {
        direction: rtl !important;
        /* Menentukan arah teks ke kanan ke kiri */
        text-align: right !important;
        /* Menyelaraskan teks ke kanan */
    }

    .ql-font-serif {
        font-family: "Times New Roman", Times, serif !important;
    }

    .ql-font-monospace {
        font-family: "Courier New", Courier, monospace !important;
    }

    .ql-indent-1 {
        padding-left: 20px !important;
        /* Memberikan indentasi ke kiri sebanyak 20px */
    }

    .ql-indent-2 {
        padding-left: 2em !important;
        /* Menambah indentasi 2em ke kiri */
    }

    //* Mengatur gaya untuk elemen <ol> dengan nomor urut */
    ol {
        /* display: block; */
        padding-left: 200px;
        /* Menambahkan padding kiri untuk memberikan indentasi */
        margin-top: 0;
        margin-bottom: 10px;
        /* list-style-type: decimal; */
        /* Menetapkan tipe nomor untuk daftar terurut */
    }

    /* Mengatur gaya untuk elemen <li> dengan tanda centang atau bullet */
    ol li {
        margin-bottom: 10px;
        /* Memberikan jarak antar item */
    }

    /* Mengatur gaya untuk <li> dengan data-list "bullet" */
    ol li[data-list="bullet"] {
        list-style-type: disc;
        /* Menetapkan gaya bullet (lingkaran) */
        padding-left: 200px;
        /* Menambahkan padding kiri untuk bullet */
        text-align: justify;
        /* Menyelaraskan teks secara merata */
    }

    /* Mengatur gaya untuk elemen <span> dengan kelas ql-ui */


    /* Gaya untuk elemen <strong> di dalam <li> untuk teks tebal */
    ol li strong {
        font-weight: bold;
        /* Menyusun teks menjadi tebal */
        /* Mengatur warna teks menjadi gelap */
    }

    /* Gaya untuk elemen <li> dengan data-list "ordered" (daftar terurut) */
    ol li[data-list="ordered"] {
        list-style-type: decimal;
        /* Menetapkan gaya nomor untuk item dalam daftar terurut */
        padding-left: 20px;
        /* Menambahkan padding kiri pada item */
        text-align: justify;
        margin-left: 50px;
        /* Menyelaraskan teks secara merata */
    }

    /* Mengatur indentasi untuk <li> dengan kelas ql-indent-1 */
    ol li.ql-indent-1 {
        padding-left: 30px;
        margin-left: 90px;
        /* Memberikan indentasi lebih besar */
    }
    ol li.ql-indent-2 {
        padding-left: 30px;
        margin-left: 130px;
        /* Memberikan indentasi lebih besar */
    }

    /* Styling untuk elemen <li> di dalam daftar terurut dengan teks tebal */
    ol li[data-list="ordered"] strong {
        font-weight: bold;
        /* Menetapkan teks menjadi tebal */
        /* Mengubah warna teks menjadi lebih gelap */

    }

    /* Styling untuk elemen bullet dengan kelas ql-indent-1 */
    ol[data-list="bullet"] li.ql-indent-1 {
        padding-left: 90px;
        /* Memberikan indentasi lebih dalam */
        text-align: justify;
        /* Menyelaraskan teks secara merata */

    }
    ol[data-list="bullet"] li.ql-indent-2 {
        padding-left: 130px;
        /* Memberikan indentasi lebih dalam */
        text-align: justify;
        /* Menyelaraskan teks secara merata */

    }

    .ql-code-block-container {
        background-color: #f2ecec;
        /* Warna latar belakang abu-abu terang untuk blok kode */
        border: 1px solid #000000;
        /* Garis pembatas */
        padding: 10px;
        /* Ruang di dalam blok */
        margin: 10px 0;
        /* Jarak di luar blok */
        font-family: 'Courier New', Courier, monospace;
        /* Font monospace untuk kode */
        font-size: 14px;
        /* Ukuran font */
        overflow-x: auto;
        /* Scroll horizontal jika teks terlalu panjang */
        border-radius: 4px;
        /* Sudut blok kode */
        color: #000000;
        /* Warna teks */
    }

    .ql-code-block-container pre {
        margin: 0;
        /* Hapus margin default pada elemen <pre> */
        line-height: 1.5;
        /* Tinggi garis untuk keterbacaan */
    }

    .ql-code-block, blockquote {
        background-color: #f6f2f2;
        /* Warna latar belakang abu-abu terang */
        border-left: 4px solid #ccc;
        /* Garis vertikal untuk membedakan blok kode */
        padding: 10px;
        /* Ruang di dalam blok */
        margin: 10px 0;
        /* Jarak di luar blok */
        font-family: 'Courier New', Courier, monospace;
        /* Font monospace untuk kode */
        font-size: 14px;
        /* Ukuran font */
        overflow-x: auto;
        /* Tambahkan scroll horizontal jika teks terlalu panjang */
        line-height: 1.5;
        /* Tinggi garis untuk keterbacaan */
        white-space: pre-wrap;
        /* Membungkus teks dan mempertahankan spasi */
        color: #000000;
        /* Warna teks */
    }


    /* Mengatur gaya untuk daftar terurut (ol) */
</style>
