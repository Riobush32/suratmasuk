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
        <div class="border-gray-300 border text-gray-300 p-5 rounded-xl  max-w-[700px]">
            <div class="">
                <legend class="text-2xl">User Edit</legend>
                <hr class="my-2">
            </div>
            <form action="{{ route('userUpdate') }}" method="POST" class="">
                @csrf
                <div class="flex flex-wrap gap-4">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Name</span>
                        </div>
                        <input type="text" name="name" value="{{ $user->name }}" id="name"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="name@company.com" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Email</span>
                        </div>
                        <input type="email" name="email" value="{{ $user->email }}" id="email"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="name@company.com" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Nip</span>
                        </div>
                        <input type="text" name="nip" value="{{ $user->nip }}" id="nip"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="12124143" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Position</span>
                        </div>
                        <input type="text" name="position" value="{{ $user->position }}" id="position"
                            class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5"
                            placeholder="ketua; sekertaris" required />

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Role</span>
                        </div>
                        <select class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5" name="role" required>
                            <option disabled selected value="{{ $user->role }}">{{ $user->role }}</option>
                            <option value="admin">Admin</option>
                            <option value="kepala">Kepala</option>
                            <option value="sekertaris">Sekertaris</option>
                            <option value="staff">Staf</option>
                            <option value="guest">Guest</option>
                        </select>

                    </label>
                    <label class="text-black form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-gray-50">Status</span>
                        </div>
                        <select class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5" name="active" required>
                            <option disabled selected value="{{ $user->active }}">{{ $user->active }}</option>
                            <option value="active">Active</option>
                            <option value="inactive">InActive</option>
                        </select>

                    </label>

                </div>


                <div class="mt-3 text-right">
                    <a href="{{ route('user') }}"
                        class="btn btn-primary btn-outline text-white font-light tracking-widest text-lg">cancel</a>
                    <button type="submit"
                        class="btn btn-primary text-white font-light tracking-widest text-lg">save</button>
                </div>
            </form>
        </div>
    </div>

</x-dashboard>
