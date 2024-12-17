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
        {{-- stat  --}}
        <div class="flex flex-wrap gap-8">
            @for ($i = 0; $i < 3; $i++)
                <div class="stats shadow-inner cursor-pointer hover:rotate-6 transition-all hover:bg-primary">
                    <div class="stat">
                        <div class="stat-title">Total Page Views</div>
                        <div class="stat-value">89,400</div>
                        <div class="stat-desc">21% more than last month</div>
                    </div>
                </div>
            @endfor
        </div>
        @include('page.surat-masuk.list')
    </div>
</x-dashboard>
