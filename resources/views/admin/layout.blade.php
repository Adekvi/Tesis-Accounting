<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} · Admin Buku Apotek</title>
    <script>
        document.documentElement.className = "js"
    </script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dash.css') }}">
    <script src="{{ asset('assets/admin/js/dash.js') }}" defer></script>
</head>

<body>
    <div class="shell">
        <aside class="rail">
            <a class="brand" href="{{ route('admin.dashboard') }}" data-nav>Buku Apotek</a>
            <nav aria-label="Menu admin">
                <a href="{{ route('admin.dashboard') }}" data-nav @class(['on' => request()->routeIs('admin.dashboard')])>Dashboard</a>
                <a href="{{ route('admin.toko.index') }}" data-nav @class(['on' => request()->routeIs('admin.toko.index')])>Daftar toko</a>
                <a href="{{ route('admin.toko.persetujuan') }}" data-nav @class(['on' => request()->routeIs('admin.toko.persetujuan')])>Persetujuan</a>
            </nav>
            <a class="back" href="{{ route('landing') }}">Ke halaman depan</a>
        </aside>
        <main id="view" tabindex="-1" aria-live="polite">{!! $content !!}</main>
    </div>
    <div class="bar" id="bar" aria-hidden="true"></div>
</body>

</html>
