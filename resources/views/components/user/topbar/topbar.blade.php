@props([
    'greeting' => 'Selamat datang',
    'storeMeta' => ['nama' => 'Toko Anda', 'kota' => '-'],
])

<div class="topbar">
    <div class="topbar-left">
        <button class="menu-toggle" id="menuToggle" type="button" aria-label="Buka menu">☰</button>
        <div>
            <h1 style="font-size:1.25rem;margin:0;">{{ $greeting }}</h1>
            <p class="empty-note" style="margin:4px 0 0;">
                {{ $storeMeta['nama'] }} · {{ $storeMeta['kota'] }}
            </p>
        </div>
    </div>
    <span class="status-pill">status: menunggu persetujuan Super Admin</span>
</div>
