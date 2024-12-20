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
                <legend class="text-2xl">Add Template</legend>
                <hr class="my-2">
            </div>
            <form action="{{ route('storeTemplate') }}" method="POST" class="" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap gap-4">
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Nama Tempalte</span>
                        </div>
                        <input type="text" name="nama_template" value="{{ old('nama_template') }}" id="nama_template"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="Surat Kelahiran" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">klasifikasi</span>
                        </div>
                        <select
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            name="klasifikasi" required>
                            <option disabled selected value="">pilih klasifikasi surat</option>
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
                    @include('page.suratKeluar.template.editor')
                </div>

                <div class="mt-3 text-right">
                    <a href="{{ route('suratKeluar') }}"
                        class="btn btn-primary btn-outline text-white font-light tracking-widest text-lg">cancel</a>
                    <button type="submit"
                        class="btn btn-primary text-white font-light tracking-widest text-lg">save</button>
                </div>
            </form>
        </div>
    </div>

</x-dashboard>
