<x-dashboard>
    <x-flash-message></x-flash-message>
    <x-slot:active>{{ $active ?? 'undefined' }}</x-slot:active>
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
    @include('quil-style')
    <div class="border-gray-300 border text-gray-300 p-5 rounded-xl"
        x-data="{
            selectedItems: [],
            modal: false,
            modalData: null,
            getDeleteUrl() {
                return `{{ route('deleteTemplate', '') }}/${this.modalData}`;
            }
        }">
        <label class="text-black form-control w-full ">
            <div class="label">
                <span class="label-text text-gray-50">Template surat</span>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
                    <div class="flex gap-1 justify-end">
                        <div class=" flex justify-end p-3">
                            <div class="">
                                <a href="{{ route('addTemplate') }}" class="btn btn-primary btn-sm">add New Template</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="join join-vertical w-full text-white">
                @forelse ($template as $item)
                    <div class="collapse collapse-arrow join-item border-base-300 border">
                        <input type="radio" name="my-accordion-4" checked="checked" />
                        <div class="collapse-title text-primary text-xl font-medium">{{ $item->nama_template }} </div>
                        <div class="collapse-content">
                            <div id="templateContent{{ $item->id }}">
                                {!! $item->isi_surat !!}
                            </div>

                            <div class="flex w-full justify-end gap-4 mt-10">
                                <button @click="modal = true, modalData = {{ $item->id }}"
                                    class="btn btn-ghost btn-xs mx-1 text-rose-300 font-light">
                                    <i class="fa-solid fa-trash"></i>Delete
                                </button>
                                <a href="{{ route('editTemplate', ['id' => $item->id]) }}"
                                    class="btn btn-ghost btn-xs mx-1 text-cyan-300 font-light"><i
                                        class="fa-solid fa-file-pen"></i>edit</a>
                                <a href="{{ route('addSuratKeluar', ['template_id' => $item->id]) }}"
                                    class="btn btn-ghost btn-xs mx-1 text-lime-300 font-light"><i
                                        class="fa-solid fa-file-import"></i>use
                                    template</a>
                            </div>

                        </div>
                    </div>
                @empty
                @endforelse
            </div>

        </label>
        <div class="w-full fixed flex justify-center z-50 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
        x-show="modal" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">
        <div class="" @click.outside="modal = false">
            <div class="modal-box bg-slate-700 border border-slate-500 min-w-96">
                <h3 class="text-lg font-bold">Warning!</h3>
                <p class="py-4">Are you sure you want to delete this item ? </p>
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

</x-dashboard>
