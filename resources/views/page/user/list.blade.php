<div class="mt-5  p-5 rounded-xl">
    <div class="overflow-x-auto"
        x-data="{
        selectedItems: [],
        modal: false,
        modalData: null,
        getDeleteUrl() {
            return `{{ route('userDestroy', '') }}/${this.modalData}`;
        }
    }">
        {{-- <div class="w-full flex justify-end p-3">
            <div class="">
                <button class="btn btn-primary btn-sm">Add New</button>
            </div>
        </div> --}}
        <table class="table">
            <!-- head -->
            <thead class="text-white">
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="font-bold">{{ $user->name }}</div>
                                    <div class="text-sm opacity-50">Nip-{{ $user->nip }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $user->position }}
                            <br />
                            @if ($user->role == 'guest')
                                <span class="badge badge-primary badge-sm">{{ $user->role }}</span>
                            @endif

                        </td>
                        <td>
                            @if ($user->active == 'active')
                                <span class="text-emerald-300">Active</span>
                            @elseif($user->active == 'inactive')
                                <span class="text-rose-300">Inactive</span>
                            @else
                                <span class="text-cyan-300">belum di seting</span>
                            @endif

                        </td>
                        <th>
                            <a href="{{ route('userEdit',['id' => $user->id]) }}" class="btn btn-ghost btn-xs mx-1 text-cyan-300 font-light">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button @click="modal = true, modalData = {{ $user->id }}"
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
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <div class="w-full flex justify-end p-3">
            <div class="">
                {{ $users->links() }}
            </div>
        </div>

            <div class="w-full fixed flex justify-center z-50 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" x-show="modal"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
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
