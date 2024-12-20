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

    <div class="w-full flex justify-center">
        <div class="border-gray-300 border text-gray-300 p-5 rounded-xl  max-w-[1100px]">
            <div class="">
                <legend class="text-2xl">Edit Surat Keluar</legend>
                <hr class="my-2">
            </div>
            <form action="{{ route('updateSuratKeluar') }}" method="POST" class="" enctype="multipart/form-data">
                @csrf @method('patch')
                <input type="hidden" name="id" value="{{ $suratKeluar->id }}">
                <div class="flex flex-wrap gap-4">
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Nomor Surat</span>
                        </div>
                        <input type="text" name="nomor_surat" value="{{ $suratKeluar->nomor_surat }}" id="nomor_surat"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="12.44.152.33.3" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Judul Surat</span>
                        </div>
                        <input type="text" name="judul_surat" value="{{ $suratKeluar->judul_surat }}" id="judul_surat"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="12.44.152.33.3" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Tanggal Surat</span>
                        </div>
                        <input type="date" name="tanggal_surat" value="{{ $suratKeluar->tanggal }}" id="tanggal_surat"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="ketua; sekertaris" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Tujuan</span>
                        </div>
                        <input type="text" name="tujuan" value="{{ $suratKeluar->tujuan }}" id="tujuan"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="berikan tanda ';' bila lebih dari 1 inputan" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Lampiran</span>
                        </div>
                        <input type="text" name="lampiran" value="{{ $suratKeluar->lampiran }}" id="lampiran"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="2" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Prihal</span>
                        </div>
                        <input type="text" name="perihal" value="{{ $suratKeluar->perihal }}" id="perihal"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="perihal" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Status</span>
                        </div>
                        <select
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            name="status" required>
                            <option  value="{{ $suratKeluar->status_id }}">{{ $suratKeluar->status->name }}</option>
                            @if (Auth::user()->role == 'admin')
                                @forelse ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            @endif
                            @if (Auth::user()->role == 'staff')
                                <option value="2">diperiksa staff</option>
                                <option value="2">ajukan ke sekertaris</option>
                            @elseif(Auth::user()->role == 'sekertaris')
                                <option value="1">kembalikan ke staff</option>
                                <option value="3">ajukan ke kepala</option>
                            @elseif(Auth::user()->role == 'kepala')
                                <option value="2">kembalikan ke sekertaris</option>
                                <option value="4">selesai</option>
                            @endif

                        </select>

                    </label>

                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Sifat</span>
                        </div>
                        <select
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            name="sifat" required>
                            <option value="{{ $suratKeluar->sifat_id }}">{{ $suratKeluar->sifat->name }}</option>
                            @forelse ($sifat as $item)
                                <option value="{{ $item->id }}">
                                    <span class="text-{{ $item->color }}">{{ $item->name }}</span>
                                </option>
                            @empty
                                <option disabled>sifat is empty</option>
                            @endforelse
                        </select>

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">klasifikasi</span>
                        </div>
                        <select
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            name="klasifikasi" required>
                            <option value="{{  $suratKeluar->klasifikasi_id }}">{{ $suratKeluar->klasifikasi->name }}</option>
                            @forelse ($klasifikasi as $item)
                                <option value="{{ $item->id }}">
                                    <span class="text-{{ $item->color }}">{{ $item->name }}</span>
                                </option>
                            @empty
                                <option disabled>klasifikasi is empty</option>
                            @endforelse
                        </select>

                    </label>

                </div>

                <div class="">
                    @include('page.suratKeluar.editor-edit')
                </div>

                <div class="mt-3 text-right">
                    <a href="{{ route('suratKeluar') }}"
                        class="btn btn-primary btn-outline text-white font-light tracking-widest text-lg">cancel</a>
                    <button type="submit"
                        class="btn btn-info text-white font-light tracking-widest text-lg">update</button>
                </div>
            </form>
        </div>
    </div>

</x-dashboard>
