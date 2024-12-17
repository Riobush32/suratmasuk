<div class="mt-5  p-5 rounded-xl">
    <div class="overflow-x-auto" x-data="{
        selectedItems: [],
        modal: false,
        modalData: null,
        getDeleteUrl() {
            return `{{ route('settingSifatDestroy', '') }}/${this.modalData}`;
        }
    }">
        <div class="w-full flex justify-between items-center p-3">
            <div class="text-primary font-light">Sifat Surat</div>
            <div class="">
                <a href="{{ route('settingSifatsAdd') }}" class="btn btn-primary btn-sm">Add New</a>
            </div>
        </div>
        <table class="table">
            <!-- head -->
            <thead class="text-white">
                <tr>
                    <th>Nama</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @forelse ($sifats as $item)
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="badge bg-{{ $item->color_list->color }} text-white font-light">{{ $item->name }}</div>
                                </div>
                            </div>
                        </td>

                        <th class="text-end">
                            <a href="{{ route('settingSifatEdit', ['id' => $item->id]) }}"
                                class="btn btn-ghost btn-xs mx-1 text-cyan-300 font-light">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button @click="modal = true, modalData = {{ $item->id }}"
                                class="btn btn-ghost btn-xs mx-1 text-rose-300 font-light">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </th>
                    </tr>
                @empty
                @endforelse

            </tbody>
            <!-- foot -->
            <tfoot class="text-white">
                <tr>
                    <th>Nama</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <div class="w-full flex justify-end p-3">
            <div class="">
                {{ $sifats->links() }}
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
