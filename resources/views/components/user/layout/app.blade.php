<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Dashboard' }} · Resepta</title>

    <x-user.include.css />
    @stack('css')
</head>

<body>
    <div class="layout">
        <aside>
            <div class="brand">Resepta <span class="tag" style="font-size:.7rem;opacity:.7">Toko</span></div>

            <x-user.sidebar.navigation :menu="$menu" :group-is-active="fn(array $items) => $groupIsActive($items)" />
        </aside>

        <main>
            <x-user.topbar.topbar :greeting="$greeting" :store-meta="$storeMeta" />

            <div id="contentArea">
                {{ $slot }}
            </div>
        </main>
    </div>

    <div class="nav-backdrop" id="navBackdrop"></div>

    <x-user.include.js />
    @stack('js')
</body>

</html>
