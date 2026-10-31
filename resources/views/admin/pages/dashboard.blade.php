@php
    $s = $stats;
    $engineLabel = ['mysql' => 'MySQL', 'pgsql' => 'PostgreSQL', 'mongodb' => 'MongoDB'];
    $statusLabel = ['active' => 'Aktif', 'pending' => 'Menunggu persetujuan', 'suspended' => 'Ditangguhkan'];
    $max = max(1, ...array_values($s['engine'] ?: [1]));
@endphp
<div data-title="Dashboard">
    <h1>Dashboard</h1>

    @unless($s['ok'])
        <p class="note">Database pusat belum bisa dihubungi. Periksa koneksi <code>central</code> di <code>.env</code>, lalu muat ulang.</p>
    @endunless

    <dl class="stats">
        <div><dt>Toko terdaftar</dt><dd data-count="{{ $s['total'] }}">{{ $s['total'] }}</dd></div>
        <div><dt>Toko aktif</dt><dd data-count="{{ $s['status']['active'] ?? 0 }}">{{ $s['status']['active'] ?? 0 }}</dd></div>
        <div><dt>Menunggu persetujuan</dt><dd data-count="{{ $s['status']['pending'] ?? 0 }}">{{ $s['status']['pending'] ?? 0 }}</dd></div>
        <div><dt>API key berlaku</dt><dd data-count="{{ $s['keys'] }}">{{ $s['keys'] }}</dd></div>
    </dl>

    <div class="two">
        <section>
            <h2>Mesin database yang dipakai</h2>
            @forelse($s['engine'] as $key => $n)
                <div class="bar-row">
                    <span>{{ $engineLabel[$key] ?? $key }}</span>
                    <i style="--w:{{ round($n / $max * 100) }}%"></i>
                    <b>{{ $n }}</b>
                </div>
            @empty
                <p class="empty">Belum ada toko. Daftarkan toko pertama lalu jalankan <code>php artisan tenant:provision</code>.</p>
            @endforelse
        </section>

        <section>
            <h2>Toko terbaru</h2>
            @forelse($s['recent'] as $t)
                <div class="line">
                    <span>{{ $t->nama_toko }}<small>{{ $engineLabel[$t->engine_db] ?? $t->engine_db }}</small></span>
                    <em class="st {{ $t->status }}">{{ $statusLabel[$t->status] ?? $t->status }}</em>
                </div>
            @empty
                <p class="empty">Belum ada toko terdaftar.</p>
            @endforelse
            <p><a href="{{ route('admin.toko') }}" data-nav>Lihat semua toko</a></p>
        </section>
    </div>
</div>
