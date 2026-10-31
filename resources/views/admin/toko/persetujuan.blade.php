<div data-title="Persetujuan toko">
    <h1>Persetujuan toko</h1>

    @if (session('success'))
        <p class="note ok">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p class="note">{{ session('error') }}</p>
    @endif
    @if (session('api_key'))
        <p class="note ok">API key toko (hanya tampil sekali): <code>{{ session('api_key') }}</code></p>
    @endif

    <div class="scroll">
        <table>
            <thead>
                <tr>
                    <th>Toko</th>
                    <th>Mesin</th>
                    <th>Database</th>
                    <th>Terdaftar</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($pending as $t)
                    <tr>
                        <td>{{ $t->nama_toko }}</td>
                        <td>{{ $t->engine_db }}</td>
                        <td><code>{{ $t->nama_database }}</code></td>
                        <td>{{ \Illuminate\Support\Carbon::parse($t->created_at)->format('d M Y') }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.toko.setujui', $t->id) }}">
                                @csrf
                                <button class="btn">Setujui dan buat database</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty">Tidak ada toko yang menunggu persetujuan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
