<x-admin.layout.app title="Persetujuan Pendaftaran Toko">

    <div class="breadcrumb">Super Admin / Manajemen Toko / Persetujuan Pendaftaran</div>

    <div class="card">
        <h3>Menunggu persetujuan</h3>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>Toko</th>
                        <th>Pemilik</th>
                        <th>Kota</th>
                        <th>Database</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pending as $s)
                        <tr>
                            <td>{{ $s['toko'] }}</td>
                            <td>{{ $s['pemilik'] }}</td>
                            <td>{{ $s['kota'] }}</td>
                            <td>{{ $s['db'] }}</td>
                            <td><span class="badge badge-pending">menunggu</span></td>
                            <td>
                                <form method="POST" action="{{ route('admin.toko.setujui', $s['id']) }}">
                                    @csrf
                                    <button class="btn-mini" type="submit">Setujui</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-note">Tidak ada pendaftaran yang menunggu saat ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <p class="empty-note">Menyetujui toko di sini yang akan memicu pembuatan database + api key baru sesuai alur
            konsep sistem.</p>
    </div>

</x-admin.layout.app>
