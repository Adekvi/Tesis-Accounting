@php
    $engineLabel = ['mysql' => 'MySQL', 'pgsql' => 'PostgreSQL', 'mongodb' => 'MongoDB'];
    $statusLabel = ['active' => 'Aktif', 'pending' => 'Menunggu persetujuan', 'suspended' => 'Ditangguhkan'];
@endphp
<div data-title="Daftar toko">
    <h1>Daftar toko</h1>

    @unless($ok)
        <p class="note">Database pusat belum bisa dihubungi. Periksa koneksi <code>central</code> di <code>.env</code>, lalu muat ulang.</p>
    @endunless

    <label class="search">Cari toko
        <input type="search" data-filter="#toko-table" placeholder="Nama toko atau database" autocomplete="off">
    </label>

    <div class="scroll">
        <table id="toko-table">
            <thead><tr><th>Nama toko</th><th>Mesin</th><th>Database</th><th>Status</th><th>Terdaftar</th></tr></thead>
            <tbody>
            @forelse($tokos as $t)
                <tr>
                    <td>{{ $t->nama_toko }}</td>
                    <td>{{ $engineLabel[$t->engine_db] ?? $t->engine_db }}</td>
                    <td><code>{{ $t->nama_database }}</code></td>
                    <td><em class="st {{ $t->status }}">{{ $statusLabel[$t->status] ?? $t->status }}</em></td>
                    <td>{{ \Illuminate\Support\Carbon::parse($t->created_at)->translatedFormat('d M Y') }}</td>
                </tr>
            @empty
                <tr><td colspan="5" class="empty">Belum ada toko terdaftar.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
