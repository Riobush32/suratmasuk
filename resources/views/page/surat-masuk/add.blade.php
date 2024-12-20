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
                <legend class="text-2xl">Add Surat Masuk</legend>
                <hr class="my-2">
            </div>
            <form action="{{ route('suratMasukStore') }}" method="POST" class=""  enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap gap-4">
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Nomor Surat</span>
                        </div>
                        <input type="text" name="nomor_surat" value="{{ old('nomor_surat') }}" id="nomor_serat"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="123/456/78/99" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Instansi Pengirim</span>
                        </div>
                        <input type="text" name="instansi_pengirim" value="" id="instansi_pengirim"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="Kec.rawang" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Nomor Agenda</span>
                        </div>
                        <input type="text" name="nomor_agenda" value="{{ old('nomor_agenda') }}" id="nomor_agenda"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="001-093-55" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Tanggal Surat</span>
                        </div>
                        <input type="date" name="tanggal_surat" value="{{ old('tanggal_surat') }}" id="tanggal_surat"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Tanggal Diterima</span>
                        </div>
                        <input type="date" name="tanggal_diterima" value="{{ old('tanggal_diterima') }}" id="tanggal_diterima"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Klasifikasi</span>
                        </div>
                        <select class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5" name="klasifikasi" required>
                            <option disabled selected value="">pilih klasifikasi</option>
                            @forelse ($klasifikasi as $item )
                                <option value="{{ $item->id }}" class="text-{{ $item->color }}">{{ $item->name }}</option>
                            @empty
                            <option disabled>klasifikasi is empty</option>
                            @endforelse

                        </select>

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Lampiran</span>
                        </div>
                        <input type="text" name="lampiran" value="{{ old('lampiran') }}" id="lampiran"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="-" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Status</span>
                        </div>
                        <select class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5" name="status" required>
                            <option disabled selected value="">pilih status</option>
                            {{-- <option value="2"></option> --}}
                            @forelse ($status as $item )
                                <option value="{{ $item->id }}">
                                    <span  class="text-{{ $item->color }}">{{ $item->name }}</span>
                                </option>
                            @empty
                            <option disabled >status is empty</option>
                            @endforelse
                        </select>

                    </label>

                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Sifat</span>
                        </div>
                        <select class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5" name="sifat" required>
                            <option disabled selected value="">pilih sifat surat</option>
                            @forelse ($sifat as $item )
                                <option value="{{ $item->id }}">
                                    <span  class="text-{{ $item->color }}">{{ $item->name }}</span>
                                </option>
                            @empty
                            <option disabled >sifat is empty</option>
                            @endforelse
                        </select>

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Document</span>
                        </div>
                        <input type="file" name="file_patch" value="{{ old('file_patch') }}" id="file_patch"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="ketua; sekertaris" />

                    </label>

                </div>


                <div class="mt-3 text-right">
                    <a href="{{ route('suratMasuk') }}"
                        class="btn btn-primary btn-outline text-white font-light tracking-widest text-lg">cancel</a>
                    <button type="submit"
                        class="btn btn-primary text-white font-light tracking-widest text-lg">save</button>
                </div>
            </form>
        </div>
    </div>

</x-dashboard>
