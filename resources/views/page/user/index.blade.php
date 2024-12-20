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
    <div class="border-gray-300 border text-gray-300 p-5 rounded-xl">
        
        @include('page.user.list')
    </div>
</x-dashboard>
