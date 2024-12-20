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
            @if ($diperiksaStaff != 0)
                <div
                    class="stats shadow-inner cursor-pointer hover:rotate-6 transition-all hover:bg-primary hover:text-white">
                    <div class="stat">
                        <div class="stat-title">Diperiksa Staff</div>
                        <div class="stat-value">{{ $diperiksaStaff }}</div>
                        <div class="stat-desc">{{ ($diperiksaStaff / $data->count()) * 100 }}% dari total surat keluar
                        </div>
                    </div>
                </div>
            @endif
            @if ($diperiksaSekertaris != 0)
                <div
                    class="stats shadow-inner cursor-pointer hover:rotate-6 transition-all hover:bg-primary hover:text-white">
                    <div class="stat">
                        <div class="stat-title">Diperiksa Sekertaris</div>
                        <div class="stat-value">{{ $diperiksaSekertaris }}</div>
                        <div class="stat-desc">{{ ($diperiksaSekertaris / $data->count()) * 100 }}% dari total surat
                            keluar
                        </div>
                    </div>
                </div>
            @endif
            @if ($diperiksaKepala != 0)
                <div
                    class="stats shadow-inner cursor-pointer hover:rotate-6 transition-all hover:bg-primary hover:text-white">
                    <div class="stat">
                        <div class="stat-title">Diperiksa Kepala</div>
                        <div class="stat-value">{{ $diperiksaKepala }}</div>
                        <div class="stat-desc">{{ ($diperiksaKepala / $data->count()) * 100 }}% dari total surat
                            keluar
                        </div>
                    </div>
                </div>
            @endif
            @if ($selesai != 0)
                <div
                    class="stats shadow-inner cursor-pointer hover:rotate-6 transition-all hover:bg-primary hover:text-white">
                    <div class="stat">
                        <div class="stat-title">Selesai</div>
                        <div class="stat-value">{{ $selesai }}</div>
                        <div class="stat-desc">{{ ($selesai / $data->count()) * 100 }}% dari total surat keluar
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @include('page.surat-masuk.list')
    </div>
</x-dashboard>
