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
    <div class="border-gray-300 border text-gray-300 p-5 rounded-xl mb-20">
        {{-- stat  --}}
        <div class="flex flex-wrap gap-4">
            <div class="border mt-3 border-slate-500 rounded-2xl">
                @include('page.setting.list-sifats')
            </div>
            <div class="border mt-3 border-slate-500 rounded-2xl">
                @include('page.setting.list-klasifikasis')
            </div>
            <div class="border mt-3 border-slate-500 rounded-2xl">
                @include('page.setting.list-status')
            </div>


        </div>

    </div>
</x-dashboard>
