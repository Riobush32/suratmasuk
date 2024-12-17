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
                <legend class="text-2xl">Edit Sifat</legend>
                <hr class="my-2">
            </div>
            <form action="{{ route('settingSifatUpdate') }}" method="POST" class="" >
                @csrf @method('patch')
                <input type="hidden" value="{{ $sifat->id }}" name="id">
                <div class="flex flex-wrap gap-4">
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Nama</span>
                        </div>
                        <input type="text" name="name" value="{{ $sifat->name }}" id="nomor_serat"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="name@company.com" required />

                    </label>
                    <label class="text-black form-control ">

                        <div class="m-1 bg-transparent text-white font-light border-none">Warna</div>
                        <div class="flex flex-wrap gap-4 ">
                            @foreach ($colors as $color)
                                <div x-data="{ bg: 'bg-{{ $color->color }}' }">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="color_list_id" value="{{ $color->id }}"
                                            class="hidden peer" required>
                                        <div :class="bg"
                                            class="w-8 h-8 rounded-full border-2 border-gray-200 peer-checked:border-black">
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>


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
