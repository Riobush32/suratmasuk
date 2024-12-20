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

    <div class="w-full flex justify-center mb-20">
        <div class="border-gray-300 border text-gray-300 p-5 rounded-xl  max-w-[1100px]">
            <div class="">
                <legend class="text-2xl text-white">Informasi Surat</legend>
                <hr class="my-2">
            </div>
            <div class="grid grid-cols-2 gap-4 mt-3">
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-gray-400">
                        <h1>Nomor Surat </h1>
                    </div>
                    <div class="text-white">
                        : <span>{{ $suratKeluar->nomor_surat }}</span>
                    </div>
                    <div class="text-gray-400">
                        <h1>Judul Surat </h1>
                    </div>
                    <div class="text-white">
                        : <span>{{ $suratKeluar->judul_surat }}</span>
                    </div>
                    <div class="text-gray-400">
                        <h1>Perihal </h1>
                    </div>
                    <div class="text-white">
                        : <span>{{ $suratKeluar->perihal }}</span>
                    </div>
                    <div class="text-gray-400">
                        <h1>Lampiran </h1>
                    </div>
                    <div class="text-white">
                        : <span>{{ $suratKeluar->lampiran }}</span>
                    </div>

                </div>
                <div class="">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-gray-400">
                            <h1>Tujuan</h1>
                        </div>
                        <div class="text-white">
                            : <span>{{ $suratKeluar->tujuan }}</span>
                        </div>
                        <div class="text-gray-400">
                            <h1>Tanggal Surat </h1>
                        </div>
                        <div class="text-white">
                            : <span>{{ $suratKeluar->tanggal }}</span>
                        </div>
                        <div class="text-gray-400">
                            <h1>klasifikasi </h1>
                        </div>
                        <div class="text-white">
                            : <div class="badge bg-{{ $suratKeluar->klasifikasi->color_list->color }}">
                                <span class="text-white text-light">{{ $suratKeluar->klasifikasi->name }}</span>
                            </div>
                        </div>
                        <div class="text-gray-400">
                            <h1>Status </h1>
                        </div>
                        <div class="text-white">
                            : <div class="badge bg-{{ $suratKeluar->status->color_list->color }}">
                                <span class="text-white text-light">{{ $suratKeluar->status->name }}</span>
                            </div>
                        </div>
                        <div class="text-gray-400">
                            <h1>Sifat </h1>
                        </div>
                        <div class="text-white">
                            : <div class="badge bg-{{ $suratKeluar->sifat->color_list->color }}">
                                <span class="text-white text-light">{{ $suratKeluar->sifat->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr class="my-3">

            <div class="w-60">
                <h1 class="text-white font-light">Catatan</h1>
                <div contenteditable="true"
                    class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 transition-all text-sm rounded-lg block w-full p-2">
                    @forelse ($catatan as $catat)
                        <h6>
                            <span
                                class="{{ $catat->user->role == 'staff' ? 'text-blue-300' : ($catat->user->role == 'sekertaris' ? 'text-rose-300' : 'lime-300') }}">
                                {{ $catat->user->role }} :
                            </span>
                            <span>{{ $catat->catatan }}</span>
                        </h6>
                    @empty
                        <span>belum ada catatan</span>
                    @endforelse

                </div>
            </div>
            <form action="{{ route('updateInfoSuratKeluar') }}" method="POST" class="w-full flex justify-between items-end">
                @csrf @method('patch')
                <input type="hidden" name="id" value="{{ $suratKeluar->id }}">
                <div class="flex items-start gap-4">
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Tindakan</span>
                        </div>
                        <select
                            class="bg-slate-700 w-52 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block p-2.5"
                            name="status" required>
                            <option value="{{ $suratKeluar->status->id }}">
                                {{ $suratKeluar->status->name }}</option>
                            @if ($suratKeluar->status->name == 'diperiksa staff')
                                <option value="2">Ajukan Ke Sekertaris</option>
                            @endif
                            @if ($suratKeluar->status->name == 'diperiksa sekertaris')
                                <option value="1">Ajukan Ke Kepala</option>
                                <option value="3">Koreksi Kembali</option>
                            @endif
                            @if ($suratKeluar->status->name == 'diperiksa kepala')
                                <option value="4">Selesai</option>
                                <option value="2">Koreksi Kembali</option>
                            @endif
                        </select>
                    </label>


                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Catatan</span>
                        </div>
                        <textarea name="catatan" id="catatan"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full textarea"
                            required>
                            </textarea>

                    </label>
                </div>
                <div class="">


                    <button type="submit" class="btn btn-ghost btn-sm mx-1 text-blue-300 font-light">
                        <i class="fa-solid fa-share-from-square"></i>
                        Ajukan
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-dashboard>
