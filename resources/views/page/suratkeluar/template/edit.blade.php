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
                <legend class="text-2xl">edit Template</legend>
                <hr class="my-2">
            </div>
            <form action="{{ route('updateTemplate') }}" method="POST" class="" enctype="multipart/form-data">
                @csrf @method('patch')
                <input type="hidden" name="id" value="{{ $template->id }}">
                <div class="flex flex-wrap gap-4">
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Nama Tempalte</span>
                        </div>
                        <input type="text" name="nama_template" value="{{ $template->nama_template }}" id="nama_template"
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
                            <option selected value="{{ $template->klasifikasi->id }}">{{ $template->klasifikasi->name }}</option>
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
                    @include('page.suratKeluar.editor')
                </div>

                <div class="mt-3 text-right">
                    <a href="{{ route('allTemplate') }}"
                        class="btn btn-primary btn-outline text-white font-light tracking-widest text-lg">cancel</a>
                    <button type="submit"
                        class="btn btn-info text-white font-light tracking-widest text-lg">update</button>
                </div>
            </form>
        </div>
    </div>

</x-dashboard>
