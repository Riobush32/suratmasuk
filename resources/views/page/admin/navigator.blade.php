<div class=" h-16 bg-white px-10 flex gap-6 justify-center items-center rounded-xl" x-data="{ active: true }">
    {{-- home  --}}
    <a href="{{ route('home') }}" class="group text-center cursor-pointer relative flex items-center justify-center">
        <div class="navigation {{ $active == 'home' ? 'navigation-active' : '' }}">
            <i class="fa-solid fa-house  group-hover:rotate-12"></i>
        </div>
        <h1
            class="scale-0 group-hover:scale-100 transition-all group-hover:translate-y-2 {{ $active == 'home' ? 'scale-100 transition-all translate-y-2' : '' }}">
            Home</h1>
    </a>
    @guest()
    @else
        @if (Auth::user()->role == 'admin')
            {{-- user  --}}
            <a href="{{ route('user') }}" class="group text-center cursor-pointer relative flex items-center justify-center">
                <div class="navigation {{ $active == 'user' ? 'navigation-active' : '' }}">
                    <i class="fa-solid fa-user  group-hover:rotate-12"></i>
                </div>
                <h1
                    class="scale-0 group-hover:scale-100 transition-all group-hover:translate-y-2 {{ $active == 'user' ? 'scale-100 transition-all translate-y-2' : '' }}">
                    User</h1>
            </a>
        @endif
        @if (Auth::user()->active == 'active')
            {{-- Surat Masuk  --}}
            <a href="{{ route('suratMasuk') }}"
                class="group text-center cursor-pointer relative flex items-center justify-center">
                <div class="navigation {{ $active == 'suratMasuk' ? 'navigation-active' : '' }}">
                    <i class="fa-solid fa-envelope-open-text  group-hover:rotate-12"></i>
                </div>
                <h1
                    class="scale-0 group-hover:scale-100 transition-all group-hover:translate-y-2 text-xs {{ $active == 'suratMasuk' ? 'scale-100 transition-all translate-y-2' : '' }}">
                    Surat <br /> Masuk</h1>
            </a>
            {{-- Surat keluar  --}}
            <a href="{{ route('suratKeluar') }}"
                class="group text-center cursor-pointer relative flex items-center justify-center mx-3">
                <div class="navigation {{ $active == 'suratKeluar' ? 'navigation-active' : '' }}">
                    <i class="fa-solid fa-up-right-from-square"></i>
                </div>
                <h1
                    class="scale-0 group-hover:scale-100 transition-all group-hover:translate-y-2 text-xs {{ $active == 'suratKeluar' ? 'scale-100 transition-all translate-y-2' : '' }}">
                    Surat <br /> Keluar</h1>
            </a>
        @endif

        @if (Auth::user()->role == 'admin')
            {{-- Setting  --}}
            <a href="{{ route('setting') }}"
                class="group text-center cursor-pointer relative flex items-center justify-center">
                <div class="navigation {{ $active == 'setting' ? 'navigation-active' : '' }}">
                    <i class="fa-solid fa-gears group-hover:rotate-12"></i>
                </div>
                <h1
                    class="scale-0 group-hover:scale-100 transition-all group-hover:translate-y-2 {{ $active == 'setting' ? 'scale-100 transition-all translate-y-2' : '' }}">
                    Setting</h1>
            </a>
        @endif

    @endguest






</div>
