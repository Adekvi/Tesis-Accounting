@props(['menu' => [], 'groupIsActive' => null])

@foreach ($menu as $key => $group)
    @php
        $isOpen = $groupIsActive ? $groupIsActive($group['items']) : $loop->first;
    @endphp

    <div class="group {{ $isOpen ? 'open' : '' }}" data-group="{{ $key }}">
        <div class="group-head">
            <span>{{ $group['label'] }}</span>
            <span class="chev">▸</span>
        </div>
        <div class="group-body">
            @foreach ($group['items'] as $item)
                @php
                    $exists = \Illuminate\Support\Facades\Route::has($item['route']);
                    $active = $exists && request()->routeIs($item['route']);
                @endphp
                <a class="submenu-item {{ $active ? 'active' : '' }}" href="{{ $exists ? route($item['route']) : '#' }}"
                    data-id="{{ $item['id'] }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>
@endforeach
