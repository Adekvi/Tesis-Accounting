<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Resepta — Akuntansi & Pajak Mandiri untuk Tiap Apotek' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Figtree:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">

    <x-landing.include.headscript />
    <x-landing.include.css />
    @stack('css')

</head>

<body>
    <x-landing.header />

    <main>
        {{ $slot }}
    </main>

    <x-landing.footer />

    <x-landing.auth.login />
    <x-landing.auth.register />

    <div class="toast" id="toast" role="status"></div>

    <x-landing.include.js />
    @stack('js')

</body>

</html>
