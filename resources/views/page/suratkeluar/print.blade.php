<!doctype html>
<html data-theme="mytheme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    {{-- icon   --}}
    <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">
    {{-- alpine  --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<body class="font-times py-10 px-10 text-xs">
    @include('quil-style')
    <div class="flex flex-col items-center border-b-2 border-gray-900 pb-4 mb-6 ">


        <div class="flex items-center mb-1 ">
            <!-- Logo -->
            <div class="w-36  mr-10 ml-5 ">
                <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
            </div>
            <div class="w-full mr-20">
                <!-- Nama Instansi -->
                <h1 class="text-xl font-bold text-gray-900 uppercase text-center">
                    Pemerintah kabupaten asahan <br> kecamantan rawang panca arga <br> desa panca arga
                </h1>
                <!-- Alamat -->
                <p class="text-gray-700 text-sm text-center">
                    Alamat: Jalan Besar Panca Arga I, Kode Pos.21264<br>
                    {{-- Telepon: (021) 123-4567 | Email: info@example.com --}}
                </p>
            </div>

        </div>

        <!-- Garis Pembatas -->
        <hr class="h-4 bg-gray-300 border-0 rounded-lg">
    </div>

    <div class="w-full text-sm px-3">
        @if($suratKeluar->tujuan != '-')
        <div class="mt-2 grid grid-cols-3 justify-between">
            <div class=""></div>
            <div class=""></div>
            <div class="pb-5"> Panca Arga, {{ $suratKeluar->tanggal }}</div>
            <div class="">
                <div class="grid grid-cols-2 w-40 gap-1">
                    <div class="">Nomor</div>
                    <div class="">: {{ $suratKeluar->nomor_surat }}</div>
                    <div class="">Sifat</div>
                    <div class="">: {{ $suratKeluar->sifat->name }}</div>
                    <div class="">Lampiran</div>
                    <div class="">: {{ $suratKeluar->lampiran }}</div>
                    <div class="">Perihal</div>
                    <div class="">: {{ $suratKeluar->perihal }}</div>
                </div>
            </div>

            <div class=""></div>
            @php
                $tujuan = explode(';', $suratKeluar->tujuan);
            @endphp
            <div class="w-56">
                <p>Kepada Yth:</p>
                <ul class="list-outside list-none mt-1">
                    @forelse ($tujuan as $item)
                        <li>-<span>{{ $item }}</span></li>
                    @empty
                        <li>{{ $suratKeluar->tujuan }}</li>
                    @endforelse
                </ul>

                <div class="mt-4">
                    <p>di-</p>
                    <div class="ml-10">Tempat</div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class=" mt-10">
        {!! $suratKeluar->isi !!}
    </div>
    <div class="w-full flex justify-end px-5">
        <div class="">
            <p>Panca Arga, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p class="mt-3">Kepala Desa Panca Arga</p>
            <p>Kec.Rawang Panca Arga</p>
            <p class="mt-20"><b><u>SUPRIADI</u></b></p>
        </div>
    </div>
    <script>
        window.print()
    </script>
</body>

</html>
