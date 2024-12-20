<x-dashboard>
    <x-slot:active>{{ $active }}</x-slot:active>
    <x-slot:breadcrumbs>
        @foreach ($breadcrumbs as $item)
        <li>
            <a href="{{ $item['link'] }}" class="{{ $item['link'] == '' ? 'pointer-events-none' : '' }}">
                <span class="mx-1 text-xs"><i class="fa-solid {{ $item['icon'] }}"></i></span>
                {{ $item['name'] }}
            </a>
        </li>
        @endforeach
    </x-slot:breadcrumbs>
    <div class="border-gray-300 border text-gray-300 p-5 rounded-xl px-20">
            <h1 class="text-3xl font-semibold text-center text-slate-200 mb-6">Profil Desa Panca Arga</h1>

            <div class="space-y-4">
                <!-- Sejarah Desa -->
                <section>
                    <h2 class="text-2xl font-semibold text-slate-300">I. Sejarah Desa</h2>
                    <p>Desa Panca Arga terletak di Kecamatan Rawang Panca Arga, Kabupaten Asahan, Provinsi Sumatera Utara. Nama desa ini diperkirakan berasal dari kata "Panca," yang berarti lima, dan "Arga," yang merujuk pada suatu tempat atau kawasan. Masyarakat desa ini sebelumnya hidup dalam wilayah yang lebih luas, namun seiring berjalannya waktu dan terbentuknya kecamatan baru pada tahun 2008, desa ini menjadi bagian dari Kecamatan Rawang Panca Arga.</p>
                </section>

                <!-- Geografi -->
                <section>
                    <h2 class="text-2xl font-semibold text-slate-300">II. Geografi</h2>
                    <p>Desa Panca Arga terletak di wilayah yang strategis di Kecamatan Rawang Panca Arga, berbatasan dengan beberapa kecamatan lain yang memudahkan akses ke berbagai pusat kegiatan ekonomi dan sosial.</p>
                    <ul class="list-disc pl-6">
                        <li><strong>Sebelah Utara:</strong> Berbatasan dengan Kecamatan Meranti dan Kabupaten Batu Bara.</li>
                        <li><strong>Sebelah Timur:</strong> Berbatasan dengan Kecamatan Silau Laut dan Kecamatan Air Joman.</li>
                        <li><strong>Sebelah Selatan:</strong> Berbatasan dengan Kecamatan Kota Kisaran Timur dan Kota Kisaran Barat.</li>
                        <li><strong>Sebelah Barat:</strong> Berbatasan dengan Kecamatan Meranti dan Kecamatan Pulo Bandring.</li>
                    </ul>
                </section>

                <!-- Demografi -->
                <section>
                    <h2 class="text-2xl font-semibold text-slate-300">III. Demografi</h2>
                    <p>Desa Panca Arga dihuni oleh masyarakat yang mayoritas berprofesi sebagai petani dan pedagang. Sebagian besar penduduk desa ini mengandalkan sektor pertanian untuk memenuhi kebutuhan hidup mereka. Selain itu, masyarakat Desa Panca Arga juga dikenal ramah dan gotong-royong dalam menjaga kebersihan serta keindahan desa.</p>
                </section>

                <!-- Ekonomi -->
                <section>
                    <h2 class="text-2xl font-semibold text-slate-300">IV. Ekonomi</h2>
                    <p>Perekonomian di Desa Panca Arga didominasi oleh sektor pertanian, di mana penduduknya mayoritas bertani. Tanaman yang banyak dibudidayakan antara lain padi, jagung, dan sayur-sayuran. Selain itu, sektor perdagangan juga berkembang, terutama di sekitar pasar desa, yang menjadi tempat bertemunya pedagang dan pembeli dari luar desa.</p>
                </section>

                <!-- Infrastruktur -->
                <section>
                    <h2 class="text-2xl font-semibold text-slate-300">V. Infrastruktur</h2>
                    <p>Infrastruktur di Desa Panca Arga terus mengalami perbaikan dari tahun ke tahun. Beberapa fasilitas yang ada di desa ini meliputi:</p>
                    <ul class="list-disc pl-6">
                        <li><strong>Jalan Desa:</strong> Akses jalan yang menghubungkan desa dengan kecamatan dan kabupaten terdekat.</li>
                        <li><strong>Pendidikan:</strong> Terdapat sekolah dasar dan menengah pertama yang dapat mengakomodasi anak-anak desa untuk menempuh pendidikan.</li>
                        <li><strong>Kesehatan:</strong> Fasilitas kesehatan berupa puskesmas pembantu yang menyediakan layanan kesehatan dasar untuk warga desa.</li>
                        <li><strong>Listrik dan Air Bersih:</strong> Sebagian besar wilayah desa sudah teraliri listrik dan memiliki akses terhadap air bersih, meskipun masih ada beberapa bagian yang sedang dalam tahap peningkatan.</li>
                    </ul>
                </section>

                <!-- Pemerintahan Desa -->
                <section>
                    <h2 class="text-2xl font-semibold text-slate-300">VI. Pemerintahan Desa</h2>
                    <p>Desa Panca Arga dipimpin oleh seorang Kepala Desa yang dipilih langsung oleh masyarakat desa. Pemerintahan desa berfokus pada pelayanan kepada masyarakat, peningkatan infrastruktur, dan pengembangan sektor pertanian serta ekonomi lokal.</p>
                </section>

                <!-- Potensi dan Harapan -->
                <section>
                    <h2 class="text-2xl font-semibold text-slate-300">VII. Potensi dan Harapan</h2>
                    <p>Desa Panca Arga memiliki berbagai potensi yang dapat dikembangkan, seperti:</p>
                    <ul class="list-disc pl-6">
                        <li><strong>Pertanian:</strong> Potensi besar di sektor pertanian yang dapat ditingkatkan dengan penggunaan teknologi pertanian modern.</li>
                        <li><strong>Pariwisata Alam:</strong> Keindahan alam sekitar desa bisa menjadi daya tarik wisatawan, terutama bagi mereka yang menyukai suasana pedesaan.</li>
                        <li><strong>Pemberdayaan Masyarakat:</strong> Peningkatan kapasitas masyarakat melalui pelatihan keterampilan dan program kewirausahaan.</li>
                    </ul>
                    <p>Dengan berbagai potensi ini, Desa Panca Arga berharap dapat berkembang menjadi desa yang mandiri dan sejahtera, di mana kesejahteraan sosial dan ekonomi warganya terus meningkat.</p>
                </section>
            </div>



    </div>
</x-dashboard>
