<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Resepta — Super Admin' }}</title>

    <x-admin.include.css />
    @stack('css')

</head>

<body>
    <div class="layout">
        <aside>
            <div class="brand">Resepta<span class="tag">Super Admin</span></div>

            <div class="side-label">Kelola Sistem</div>
            @foreach ($globalMenu as $group)
                <div class="group {{ $groupIsActive($group['items']) || $loop->first ? 'open' : '' }}">
                    <div class="group-head">
                        <span>{{ $group['label'] }}</span>
                        <span class="chev">▸</span>
                    </div>
                    <div class="group-body">
                        @foreach ($group['items'] as $item)
                            @php $exists = \Illuminate\Support\Facades\Route::has($item['route']); @endphp
                            <a class="submenu-item {{ $exists && request()->routeIs($item['route']) ? 'active' : '' }}"
                                href="{{ $exists ? route($item['route']) : '#' }}">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="side-label store">Operasional — {{ $selectedStore['toko'] }}</div>
            @foreach ($storeMenu as $group)
                <div class="group {{ $groupIsActive($group['items']) || $loop->first ? 'open' : '' }}">
                    <div class="group-head">
                        <span>{{ $group['label'] }}</span>
                        <span class="chev">▸</span>
                    </div>
                    <div class="group-body">
                        @foreach ($group['items'] as $item)
                            @php $exists = \Illuminate\Support\Facades\Route::has($item['route']); @endphp
                            <a class="submenu-item {{ $exists && request()->routeIs($item['route']) ? 'active' : '' }}"
                                href="{{ $exists ? route($item['route'], ['store' => $selectedStore['id']]) : '#' }}">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </aside>

        <main>
            <div class="topbar">
                <div class="topbar-left">
                    <button class="menu-toggle" id="menuToggle" type="button" aria-label="Buka menu">☰</button>
                    <div>
                        <h1 style="font-size:1.4rem;">{{ $title ?? 'Dashboard Super Admin' }}</h1>
                        <div class="whoami">akses penuh · seluruh toko &amp; database</div>
                    </div>
                </div>

                <form method="GET" class="store-switch">
                    <label for="storeSelect">Sedang mengelola data operasional toko:</label>
                    <select id="storeSelect" name="store" onchange="this.form.submit()">
                        @foreach ($activeStores as $s)
                            <option value="{{ $s['id'] }}" @selected($s['id'] === $selectedStore['id'])>
                                {{ $s['toko'] }} ({{ $s['db'] }})
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div id="contentArea">
                {{ $slot }}
            </div>
        </main>
    </div>

    <div class="nav-backdrop" id="navBackdrop"></div>

    @stack('js')
    <x-admin.include.js />

</body>

</html>
