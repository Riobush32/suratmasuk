<div class="mt-5  p-5 rounded-xl">
    <div class="overflow-x-auto" x-data="{
        selectedItems: [],
        modal: false,
        modalData: null,
        getDeleteUrl() {
            return `{{ route('suratMasukDestroy', '') }}/${this.modalData}`;
        }
    }">
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
            <div class="w-full flex justify-end p-3">
                <div class="">
                    <a href="{{ route('addSuratKeluar') }}" class="btn btn-primary btn-sm">Add New</a>
                </div>
            </div>
        @endif

        <table class="table">
            <!-- head -->
            <thead class="text-white">
                <tr>
                    <th>Instansi Pengirim </th>
                    <th>Tanggal</th>
                    <th>Lampiran</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @forelse ($data as $item)
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="font-bold">{{ $item->instansi_pengirim }}</div>
                                    <div class="text-sm opacity-50">Nomor Surat - <span
                                            class="text-yellow-300 opacity-100">{{ $item->nomor_surat }}</span></div>
                                    <div class="text-sm opacity-50">Nomor Agenda - <span
                                            class="text-fuchsia-300 opacity-100">{{ $item->nomor_agenda }}</span></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-sm opacity-50">Tanggal Surat -
                                <span class="text-yellow-300 opacity-100">{{ $item->tanggal_surat }}</span>
                            </div>
                            <div class="text-sm opacity-50">Tanggal Diterima -
                                <span class="text-fuchsia-300 opacity-100">{{ $item->tanggal_surat }}</span>
                            </div>
                        </td>
                        <td>
                            <p class="max-w-32">{{ $item->lampiran }}</p>
                        </td>
                        <td>
                            <div class="text-sm opacity-50">Klasifikasi -
                                <div
                                    class="badge text-white bg-{{ $item->klasifikasi->color_list->color }} opacity-100">
                                    {{ $item->klasifikasi->name }}</div>
                            </div>
                            <div class="text-sm opacity-50 mt-1">Status -
                                <div class="badge text-white bg-{{ $item->status->color_list->color }} opacity-100">
                                    {{ $item->status->name }}</div>
                            </div>
                            <div class="text-sm opacity-50 mt-1">Sifat -
                                <div class="badge text-white bg-{{ $item->sifat->color_list->color }} opacity-100">
                                    {{ $item->sifat->name }}</div>
                            </div>
                        </td>

                        <th class="text-end">
                            @if ($item->file_patch != null)
                                <a href="{{ asset('suratmasuks/' . $item->file_patch) }}" target="_blank"
                                    class="btn btn-ghost btn-xs mx-1 text-lime-300 font-light">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                            @endif
                            @php
                                if (Auth::user()->role != 'admin') {
                                    $status = $item->status_id;
                                    if (Auth::user()->role == 'staff') {
                                        $petugas = 3;
                                    }
                                    if (Auth::user()->role == 'sekertaris') {
                                        $petugas = 2;
                                    }
                                    if (Auth::user()->role == 'kepala') {
                                        $petugas = 1;
                                    }
                                }

                            @endphp
                            @if (Auth::user()->role != 'admin')
                                @if ($petugas == $status)
                                    <a href="{{ route('info', ['id' => $item->id]) }}"
                                        class="btn btn-ghost btn-xs mx-1 text-gray-100 font-light">
                                        <i class="fa-solid fa-share-from-square"></i>
                                    </a>
                                @endif
                            @endif

                            @if (Auth::user()->role == 'admin')
                                <a href="{{ route('info', ['id' => $item->id]) }}"
                                    class="btn btn-ghost btn-xs mx-1 text-gray-100 font-light">
                                    <i class="fa-solid fa-share-from-square"></i>
                                </a>
                                <a href="{{ route('suratMasukEdit', ['id' => $item->id]) }}"
                                    class="btn btn-ghost btn-xs mx-1 text-cyan-300 font-light">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button @click="modal = true, modalData = {{ $item->id }}"
                                    class="btn btn-ghost btn-xs mx-1 text-rose-300 font-light">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            @endif


                            @if ($item->status->name == 'diperiksa staff')
                                <a href="{{ route('suratMasukEdit', ['id' => $item->id]) }}"
                                    class="btn btn-ghost btn-xs mx-1 text-cyan-300 font-light">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button @click="modal = true, modalData = {{ $item->id }}"
                                    class="btn btn-ghost btn-xs mx-1 text-rose-300 font-light">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            @endif
                        </th>
                    </tr>
                @empty
                @endforelse

            </tbody>
            <!-- foot -->
            <tfoot class="text-white">
                <tr>
                    <th>Nomor Surat </th>
                    <th>Lampiran</th>
                    <th>Lampiran</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <div class="w-full flex justify-end p-3">
            <div class="">
                {{ $data->links() }}
            </div>
        </div>

        <div class="w-full fixed flex justify-center z-50 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
            x-show="modal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">
            <div class="" @click.outside="modal = false">
                <div class="modal-box bg-primary min-w-96">
                    <h3 class="text-lg font-bold">Warning!</h3>
                    <p class="py-4">Are you sure you want to delete this item from
                        your cart? </p>
                    <div class="modal-action">
                        <form method="post" :action="getDeleteUrl()">
                            @csrf
                            @method('delete')
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="btn" type="button" @click="modal = false">Close</button>
                            <button class="btn" type="submit">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
