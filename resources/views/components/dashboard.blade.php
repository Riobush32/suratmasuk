<!doctype html>
<html data-theme="mytheme" class="bg-slate-700">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}
    {{-- icon   --}}
    <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">
    {{-- alpine  --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('/build/assets/quill-BzY4kI8E.css') }}">
    <link rel="stylesheet" href="{{ asset('/build/assets/app-DbStIDiI.css ') }}">
    <script src="{{ asset('/build/assets/editor-BbP1IzUE.js  ') }}"></script>
    <script src="{{ asset('/build/assets/editor2-BbP1IzUE.js ') }}"></script>

<body class="min-h-[100vh] font-body scrollbar scrollbar-thumb-primary">

    <div class="px-16 mt-2 py-3 ">
        <div class="flex w-full justify-center z-[9999999]">
            @include('page.admin.navbar')
        </div>

        <div class="mt-20 px-3">
            <div class="flex items-center justify-between pt-3">
                <div class="breadcrumbs text-sm text-white mb-2">
                    <ul>
                        {{ $breadcrumbs }}
                    </ul>
                </div>

                {{-- user --}}
                @guest
                @else
                    <div class="text-white">
                        {{ Auth::user()->role }}, Selamat Datang <span class="text-primary">{{ Auth::user()->name }}</span>
                    </div>
                @endguest

            </div>


                {{ $slot }}


        </div>

        <div class="scale-50 md:scale-100 fixed bottom-3 left-1/2 transform -translate-x-1/2">
            @include('page.admin.navigator')
        </div>
    </div>

    {{-- copyright --}}
    {{-- <div class="w-full">
        <div class="fixed z-50 rotate-90 -translate-x-60 top-80">
            @include('page.admin.copyright')
        </div>
    </div> --}}
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
    {{-- @livewireScripts --}}
</body>

</html>
